<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Category;
use App\Models\Materiaal;
use App\Models\MaterialType;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UploadTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_valid_file()
    {
        Storage::fake('private');

        $type = MaterialType::where('type', 'pdf')->firstOrFail();
        $category = Category::firstOrFail();

        $file = UploadedFile::fake()->create('example.pdf', 200);
        $response = $this->post('/upload', [
            'description'       => 'Test description',
            'material_type_id'  => $type->id,
            'category_id'       => $category->id,
            'file'              => $file,
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        Storage::disk('private')->assertExists('materials/' . $file->hashName());
    }

    public function test_invalid_file_type()
    {
        $file = UploadedFile::fake()->create('markdown.md', 200);
        $response = $this->post('/upload', [
            'description' => 'Test description',
            'material_type_id' => 1,
            'category_id' => 1,
            'file' => $file,
        ]);

        $response->assertSessionHasErrors(['file']);
    }

    public function test_file_required()
    {
        $type = MaterialType::where('type', 'pdf')->firstOrFail();

        $response = $this->post('/upload', [
            'description' => 'Test description',
            'material_type_id' => $type->id,
            'category_id' => 1,
        ]);

        $response->assertSessionHasErrors([
            'file' => 'Bestand is verplicht voor dit materiaal type.'
        ]);
    }

    public function test_url_required()
    {
        $type = MaterialType::where('type', 'youtube-link')->firstOrFail();

        $response = $this->post('/upload', [
            'description' => 'Test description',
            'material_type_id' => $type->id,
            'category_id' => 1,
        ]);

        $response->assertSessionHasErrors([
            'URL' => 'YouTube link is verplicht.'
        ]);
    }

    public function test_valid_youtube_url()
    {
        $type = MaterialType::where('type', 'youtube-link')->firstOrFail();

        $response = $this->post('/upload', [
            'description' => 'Test description',
            'material_type_id' => $type->id,
            'category_id' => 1,
            'URL' => 'http://127.0.0.1:8000/admin/dashboard',
        ]);

        $response->assertSessionHasErrors([
            'URL' => 'Ongeldige YouTube URL.'
        ]);
    }

    public function test_youtube_url_converted()
    {

        $type = MaterialType::where('type', 'youtube-link')->firstOrFail();

        $response = $this->post('/upload', [
            'title' => 'youtube-test-video',
            'description' => 'Test description',
            'material_type_id' => $type->id,
            'category_id' => 1,
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
        $type = MaterialType::where('type', 'artikel')->firstOrFail();

        $response = $this->post('/upload', [
            'title' => 'Test title',
            'description'       => 'Test description',
            'material_type_id'  => $type->id,
            'category_id'       => 1,
            'URL'              => 'https://www.autisme.nl/over-autisme/wat-is-autisme/',
        ]);

        $this->assertDatabaseHas('materiaal', [
            'title' =>'Test title'
        ]);
    }
}
