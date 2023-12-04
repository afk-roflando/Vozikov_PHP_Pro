<?php
require_once __DIR__ .'/vendor/autoload.php';

class ProductData {
    public function get($name) {}
    public function set($name, $value) {}
    public function save() {}
    public function update() {}
    public function delete() {}
}

class ProductProcessor {
    public function process() {}
}

class ProductOutput {
    public function show($data) {
        echo "Product Information:\n";
        echo "Name: " . $data['name'] . "\n";
        echo "Price: " . $data['price'] . "\n";
        echo "Category: " . $data['category'] . "\n";
    }
    public function print($data) {
        $output = "Product Information:\n";
        $output .= "Name: " . $data['name'] . "\n";
        $output .= "Price: " . $data['price'] . "\n";
        $output .= "Category: " . $data['category'] . "\n";

        return $output;
    }
    public function displayAsJSON($data)
    {
        return json_encode($data);
    }

    public function renderAsHTML($data) {
        $html = "<div class='product'>";
        $html .= "<h2>{$data['name']}</h2>";
        $html .= "<p>Price: {$data['price']}</p>";
        $html .= "<p>Category: {$data['category']}</p>";
        $html .= "</div>";

        return $html;
    }
}

$productData = ['name' => 'Example Product', 'price' => 50.00, 'category' => 'Electronics'];

$outputHandler = new ProductOutput();
$outputHandler->show($productData);

$outputString = $outputHandler->print($productData);
dd($outputString);

$jsonOutput = $outputHandler->displayAsJSON($productData);
dd($jsonOutput);

$htmlOutput = $outputHandler->renderAsHTML($productData);
dd($htmlOutput);
