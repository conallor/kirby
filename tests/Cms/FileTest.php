<?php

namespace Kirby\Cms;

class FileTest extends TestCase
{
    protected $app;
    protected $fixtures;

    public function app()
    {
        return new App([
            'roots' => [
               'index' => $this->fixtures = __DIR__ . '/fixtures/files'
            ],
            'site' => [
                'children' => [
                    [
                        'slug'  => 'test',
                        'files' => [
                            [
                                'filename' => 'test.jpg'
                            ]
                        ]
                    ]
                ]
            ]
        ]);
    }


    public function testModified()
    {
        $app = $this->app();
        $file = $app->page('test')->file('test.jpg');

        $this->assertInstanceOf(File::class, $file);
        $this->assertEquals(1552726245, $file->modified());
    }
}
