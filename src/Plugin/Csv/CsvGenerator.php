<?php

namespace FanCourier\Plugin\Csv;

use CURLFile;

trait CsvGenerator
{
    use CsvMapping;

    /**
     * Name of the temporary CSV file.
     *
     * @var string
     */
    private $tmpFName;

    /**
     * @var
     */
    private $csv;

    /**
     * @return CURLFile
     */
    public function getFile()
    {
        return new CURLFile($this->tmpFName, 'text/csv', 'fisier');
    }

    /**
     * Creating a temporary csv file in memory.
     */
    public function createFile()
    {
        $this->tmpFName = tempnam("/tmp", "FanCourier");
        $this->csv = fopen($this->tmpFName, 'a');
        fputcsv($this->csv, $this->getHeader(), ',', chr(0));
    }

    /**
     * Add a new line into the CSV file.
     *
     * @param csvItem $item
     *   New line of CSV file.
     *
     * @see \FanCourier\Plugin\csv\csvItem
     */
    public function addNewItem(csvItem $item)
    {
        fputcsv($this->csv, $item->getItem(), ',', chr(0));
    }

    /**
     * Transforming the temporary csv file into text(Mostly for test use).
     *
     * @return string
     */
    public function csvToText()
    {
        $fp = fopen($this->tmpFName, "r");
        $csv = stream_get_contents($fp);
        fclose($fp);

        return $csv;
    }

    /**
     * Close the temporary file.
     */
    public function __destruct()
    {
        fclose($this->csv);
    }

}
