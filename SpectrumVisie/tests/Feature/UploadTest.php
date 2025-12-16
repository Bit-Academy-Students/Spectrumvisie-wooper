<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Category;
use App\Models\Materiaal;
use App\Models\MaterialType;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UploadTest extends TestCase
{
    use RefreshDatabase;

    protected $category;
    protected $pdfType;
    protected $youtubeType;
    protected $artikelType;

    protected function setUp(): void
    {
        parent::setUp();

        // seed the database so standard records exist
        $this->seed();

        // create global variables for types/categories that are use multiple times
        $this->pdfType = MaterialType::where('type', 'pdf')->firstOrFail();
        $this->youtubeType = MaterialType::where('type', 'youtube-link')->firstOrFail();
        $this->artikelType = MaterialType::where('type', 'artikel')->firstOrFail();

        $this->category = Category::firstOrFail();

        Storage::fake('private');
    }

    // basic function to upload a pdf file to not repeat code
    public function upload_file(string $title, $type = null, $category = null, $file = null)
    {
        $type ??= $this->pdfType;
        $category ??= $this->category;

        $file ??= UploadedFile::fake()->create('example.pdf', 200);

        $response = $this->post('/upload', [
            'title' => $title,
            'description' => 'Test description',
            'material_type_id' => $type->id,
            'category_id' => $category->id,
            'file' => $file,
        ]);

        return [
            'response' => $response,
            'file' => $file,
        ];
    }

    public function test_valid_file()
    {
        $title = 'Test valid file';
        $data = $this->upload_file($title);

        $data['response']->assertRedirect();
        $data['response']->assertSessionHas('success');

        $this->assertDatabaseHas('materiaal', [
            'title' => $title
        ]);
    }

    public function test_invalid_file_type()
    {
        $title = 'Test invalid type';
        $file = UploadedFile::fake()->create('markdown.md', 200);

        $data = $this->upload_file($title, null, null, $file);

        $data['response']->assertSessionHasErrors(['file']);
    }

    public function test_file_required()
    {
        $response = $this->post('/upload', [
            'description' => 'Test description',
            'material_type_id' => $this->pdfType->id,
            'category_id' => $this->category->id,
        ]);

        $response->assertSessionHasErrors([
            'file' => 'Bestand is verplicht voor dit materiaal type.'
        ]);
    }

    public function test_url_required()
    {
        $response = $this->post('/upload', [
            'description' => 'Test description',
            'material_type_id' => $this->youtubeType->id,
            'category_id' => $this->category->id,
        ]);

        $response->assertSessionHasErrors([
            'URL' => 'YouTube link is verplicht.'
        ]);
    }

    public function test_valid_youtube_url()
    {
        $response = $this->post('/upload', [
            'description' => 'Test description',
            'material_type_id' => $this->youtubeType->id,
            'category_id' => $this->category->id,
            'URL' => 'http://127.0.0.1:8000/admin/dashboard',
        ]);

        $response->assertSessionHasErrors([
            'URL' => 'Ongeldige YouTube URL.'
        ]);
    }

    public function test_youtube_url_converted()
    {
        $response = $this->post('/upload', [
            'title' => 'youtube-test-video',
            'description' => 'Test description',
            'material_type_id' => $this->youtubeType->id,
            'category_id' => $this->category->id,
            'URL' => 'https://youtu.be/mVvHlVZBc5Y',
        ]);

        $response->assertSessionHasNoErrors();

        $materiaal = Materiaal::where('title', 'youtube-test-video')->first();

        $this->assertEquals(
            'https://www.youtube.com/embed/mVvHlVZBc5Y',
            $materiaal->URL
        );
    }

    public function test_row_created()
    {
        $response = $this->post('/upload', [
            'title' => 'Test title',
            'description' => 'Test description',
            'material_type_id' => $this->artikelType->id,
            'category_id' => $this->category->id,
            'URL' => 'https://www.autisme.nl/over-autisme/wat-is-autisme/',
        ]);

        $this->assertDatabaseHas('materiaal', [
            'title' => 'Test title'
        ]);
    }

    public function test_stores_file_path()
    {
        $title = 'File path stored';
        $data = $this->upload_file($title);

        Storage::disk('private')->assertExists('materials/' . $data['file']->hashName());

        $this->assertDatabaseHas('materiaal', [
            'file_path' => 'materials/' . $data['file']->hashName()
        ]);
    }

    public function test_invalid_category_id()
    {
        $title = 'Test invalid category id';

        $response = $this->post('/upload', [
            'title' => $title,
            'description' => 'Test description',
            'material_type_id' => $this->pdfType->id,
            'category_id' => 100,
        ]);

        $response->assertSessionHasErrors(['category_id']);
        $this->assertDatabaseMissing('materiaal', [
            'title' => $title
        ]);

    }
}
