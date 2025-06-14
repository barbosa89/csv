<?php

namespace Barbosa\Csv\Tests;

use Barbosa\Csv\Reader;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

class CsvReaderTest extends TestCase
{
    #[Test]
    public function itReadCsvFileSuccessfully(): void
    {
        $filePath = __DIR__ . '/fixtures/sample.csv';
        $reader = new Reader($filePath);

        $data = iterator_to_array($reader->read());

        $this->assertCount(2, $data);
        $this->assertEquals(['mail', 'username'], $data[0]);
        $this->assertEquals(['test@example.com', 'testuser'], $data[1]);
    }
}
