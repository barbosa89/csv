<?php

namespace Barbosa\Csv;

use Barbosa\Csv\Constants\Delimiter;
use Generator;

class Reader
{
    protected $file;

    public function __construct(
        protected string $filePath,
        protected Delimiter $delimiter = Delimiter::COMMA,
        protected int $length = 4096,
    ) {
        $this->file = fopen($this->filePath, 'r');
    }

    public function read(): Generator
    {
        try {
            while (! feof($this->file)) {
                $data = fgetcsv($this->file, $this->length, $this->delimiter->value);

                if ($data === false) {
                    break;
                }

                yield $data;
            }
        } finally {
            fclose($this->file);
        }
    }
}
