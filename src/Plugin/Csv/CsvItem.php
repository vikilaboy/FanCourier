<?php

namespace FanCourier\Plugin\Csv;

class CsvItem
{
    use CsvMapping;

    /**
     * Array containing the csv item.
     *
     * @var array
     */
    private $item;

    /**
     * Creat a blank csv item.
     */
    public function __construct()
    {
        $this->item = array_fill(0, count($this->getMachinNames()) - 1, '');
    }

    /**
     * New item.
     *
     * @return \FanCourier\Plugin\Csv\csvItem
     */
    public static function newItem()
    {
        return new csvItem();
    }

    /**
     * @param type $key CSV column id
     * @param $value
     *
     * @see \FanCourier\Plugin\Csv\csvMapping::getMachinNames()
     */
    public function setItem($key, $value)
    {
        $this->setItems([$key => $value]);
    }

    /**
     * Update multiple columns by ID.
     *
     * @staticvar type $map
     *   Machine names of the csv columns.
     *
     * @param array $items
     *   Array of columns values.
     */
    public function setItems(array $items)
    {
        static $map;

        if (!$map) {
            $map = $this->getMachinNames();
        }

        foreach ($items as $key => $value) {
            if (isset($map[$key])) {
                $this->item[$map[$key]] = strtr($value, ',', '|');
            }
        }
    }

    /**
     * Return the saved csv line.
     *
     * @return array CSV line.
     *
     */
    public function getItem()
    {
        return $this->item;
    }
}
