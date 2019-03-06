<?php

include_once 'functions.php';

class Administrator {

    //properties

    public $admin = ['adminID' => 0, 'password' => "something"];

    //methods

    public function get_admin_id() {
        return $this['adminID'];
    }

    public function get_admin_password() {
        return $this['password'];
    }

    public function create_admin() {
        $pdo = connect_admin();

        $sql = "INSERT INTO admins (adminLastName, adminFirstName, password)
                VALUES '$this["adminLastName"]', '$this["adminFirstName"]', '$this["password"]'"; // sql statementS

        $toCreate = $pdo->prepare($sql); // prepared statement
        $toCreate->execute(); // execute sql statment
    }
    
    public function update_admin() {
        $pdo = connect_admin();

        $sql = "UPDATE admins
                SET adminLastName = '$this["adminLastName"]', adminFirstName = '$this["adminFirstName"]', password = '$this["password"]'
                WHERE adminID = '$this["adminID"]'"; // sql statementS

        $toSave = $pdo->prepare($sql); // prepared statement
        $toSave->execute(); // execute sql statment
    }
    
    public function delete_admin() {
        $pdo = connect_admin();

        $sql = "DELETE FROM admins
                WHERE adminID = '$this["adminID"]'"; // sql statementS

        $toDelete = $pdo->prepare($sql); // prepared statement
        $toDelete->execute(); // execute sql statment
    }
}

class Product {

    //properties

    public $product = ['productCode' => '0', 'productName' => 'something', 'productLine' => 'Not Set', 'productScale' = '1:1', 'productVendor' => 'Companyname', 'productDescription' => 'text', 'quantityInStock' => 0, 'buyPrice' => 0.0, 'MSRP' => 0.0];

    //methods

    public function get_product() {
        $pdo = connect_admin();

        $sql = "SELECT * FROM products
                WHERE productCode = '$this["productCode"]'"; // sql statementS

        $toGet = $pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment
        $result = $toGet->fetch();

        return $result;

    }

    public function create_product() {
        $pdo = connect_admin();

        $sql = "INSERT INTO products (productCode, productName, productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice, MSRP)
                VALUES '$this["productCode"]', '$this["productName"]', '$this["productLine"]', '$this["productScale"]', '$this["productVendor"]', '$this["productDescription"]', '$this["quantityInStock"]', '$this["buyPrice"]', '$this["MSRP"]'"; // sql statementS

        $toCreate = $pdo->prepare($sql); // prepared statement
        $toCreate->execute(); // execute sql statment
    }
    
    public function update_product() {
        $pdo = connect_admin();

        $sql = "UPDATE products
                SET productName = '$this["productName"]', productLine = '$$this["productLine"]', productScale = '$this["productScale"]', productVendor = '$this["productVendor"]', productDescription = '$this["productDescription"]', quantityInStock = '$this["quantityInStock"]', buyPrice = '$this["buyPrice"]', MSRP = '$this["MSRP"]'
                WHERE productCode = '$this["productCode"]'"; // sql statementS

        $toSave = $pdo->prepare($sql); // prepared statement
        $toSave->execute(); // execute sql statment
    }
    
    public function delete_admin() {
        $pdo = connect_admin();

        $sql = "DELETE FROM products
                WHERE productCode = '$this["productCode"]"; // sql statementS

        $toDelete = $pdo->prepare($sql); // prepared statement
        $toDelete->execute(); // execute sql statment
    }
}

class ProductLine {

    //properties

    public $productline = ['productLine' => '0', 'textDescription' => 'something', 'htmlDescription' => 'Not Set', 'image' = NULL];

    //methods

    public function get_productline() {
        $pdo = connect_admin();

        $sql = "SELECT * FROM productlines
                WHERE productLine = '$this["productLine"]'"; // sql statementS

        $toGet = $pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment
        $result = $toGet->fetch();

        return $result;

    }

    public function create_productline() {
        $pdo = connect_admin();

        $sql = "INSERT INTO productLines (productLine, textDescription, htmlDescription, image)
                VALUES '$this["productLine"]', '$this["textDescription"]', '$this["htmlDescription"]', NULL"; // sql statements

        $toCreate = $pdo->prepare($sql); // prepared statement
        $toCreate->execute(); // execute sql statment
    }
    
    public function update_productline() {
        $pdo = connect_admin();

        $sql = "UPDATE productLines
                SET textDescription = '$this["textDescription"]', htmlDescription = '$$this["htmlDescription"]'
                WHERE productLine = '$this["productLine"]'"; // sql statementS

        $toSave = $pdo->prepare($sql); // prepared statement
        $toSave->execute(); // execute sql statment
    }

    public function upload_picture(){
        
        $sql = "UPDATE productLines
                SET image = '$this["image"]'
                WHERE productLine = '$this["productLine"]'"; // sql statementS

        $toSave = $pdo->prepare($sql); // prepared statement
        $toSave->execute(); // execute sql statment
    }
    
    public function delete_productline() {
        $pdo = connect_admin();

        $sql = "DELETE FROM productLines
                WHERE productLine = '$this["productLine"]"; // sql statementS

        $toDelete = $pdo->prepare($sql); // prepared statement
        $toDelete->execute(); // execute sql statment
    }
}

class Customer {

    //properties

    public $customer = ['customerNumber' => 0, 'customerName' => 'something', 'contactLastName' => 'Not Set', 'contactFirstName' = 'Not Set', 'phone' = 'Not Set', 'adressLine1' = 'Not Set', 'adressLine2' = 'Not Set', 'city' = 'Not Set', 'state' = 'Not Set', 'postalCode' = 'Not Set', 'country' = 'Not Set', 'salesRepEmployeeNumber' = 0, 'creditLimit' = 0.0, 'password' = 'something'];

    //methods

    public function get_customer() {
        $pdo = connect_admin();

        $sql = "SELECT * FROM customers
                WHERE customerNumber = '$this["customerNumber"]'"; // sql statementS

        $toGet = $pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment
        $result = $toGet->fetch();

        return $result;

    }

    public function create_customer() {
        $pdo = connect_admin();

        $sql = "INSERT INTO customers (customerNumber, customerName, contactLastName, contactFirstName, phone, adressLine1, adressLine2, city, state, postalCode, salesRepEmployeeNumber, creditLimit)
                VALUES '$this["customerNumber"]', '$this["customerName"]', '$this["contactLastName"]', '$this["contactFirstName"]', '$this["phone"]', '$this["adressLine1"]', '$this["adressLine2"]', '$this["city"]', '$this["state"]', '$this["postalCode"]', '$this["salesRepEmployeeNumber"]', '$this["creditLimit"]'"; // sql statements

        $toCreate = $pdo->prepare($sql); // prepared statement
        $toCreate->execute(); // execute sql statment

        $sql = "INSERT INTO customers_login (customerNumber, password)
                VALUES '$this["customerNumber"]', '$this["password"]"; // sql statementS

        $toCreate = $pdo->prepare($sql); // prepared statement
        $toCreate->execute(); // execute sql statment
    }
    
    public function update_customer() {
        $pdo = connect_admin();

        $sql = "UPDATE customers
                SET customerName = '$this["customerName"]', contactLastName = '$this["contactLastName"]', contactFirstName = '$this["contactFirstName"]', phone = '$this["phone"]', adressLine1 = '$this["adressLine1"]', adressLine2 = '$this["adressLine2"]', city = '$this["city"]', state = '$this["state"]', postalCode = '$this["postalCode"]', salesRepEmployeeNumber = '$this["salesRepEmployeeNumber"]', creditLimit = '$this["creditLimit"]'
                WHERE customerNumber = '$this["customerNumber"]'"; // sql statementS

        $toSave = $pdo->prepare($sql); // prepared statement
        $toSave->execute(); // execute sql statment
    }

    public function delete_customer() {
        // anonymize data

        $pdo = connect_admin();

        $sql = "UPDATE customers
                SET customerName = 'Deleted', contactLastName = 'Deleted', contactFirstName = 'Deleted', phone = 'Deleted', adressLine1 = 'Deleted', adressLine2 = 'Deleted', city = 'Deleted', state = 'Deleted', postalCode = 'Deleted', salesRepEmployeeNumber = 0, creditLimit = 0.0
                WHERE customerNumber = '$this["customerNumber"]'"; // sql statementS

        $toSave = $pdo->prepare($sql); // prepared statement
        $toSave->execute(); // execute sql statment
    }

    public function change_password() {
        
        $pdo = connect_admin();

        $sql = "UPDATE customers_login
                SET password = '$this["password"]'
                WHERE customerNumber = '$this["customerNumber"]'"; // sql statementS

        $toSave = $pdo->prepare($sql); // prepared statement
        $toSave->execute(); // execute sql statment
    }
}

class Order {

    //properties

    public $order = ['orderNumber' => 0, 'orderDate' => 'something', 'requiredDate' => 'Not Set', 'shippedDate' = 'Not Set', 'status' = 'comments', 'customerNumber' = 'Not Set'];

    //methods

    public function get_order_by_orderNumber() {
        $pdo = connect_admin();

        $sql = "SELECT * FROM orders
                WHERE orderNumber = '$this["orderNumber"]'"; // sql statementS

        $toGet = $pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment
        $result = $toGet->fetch();

        return $result;

    }

    public function get_order_by_customerNumber() {
        $pdo = connect_admin();

        $sql = "SELECT * FROM orders
                WHERE customerNumber = '$this["customerNumber"]'"; // sql statementS

        $toGet = $pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment
        $result = $toGet->fetch();

        return $result;

    }

    public function create_order() {
        $pdo = connect_admin();

        $sql = "INSERT INTO orders (orderNumber, orderDate, requiredDate, shippedDate, status, comments, customerNumber)
                VALUES '$this["orderNumber"]', '$this["orderDate"]', '$this["requiredDate"]', '$this["shippedDate"]', '$this["status"]', '$this["comments"]', '$this["customerNumber"]'"; // sql statements

        $toCreate = $pdo->prepare($sql); // prepared statement
        $toCreate->execute(); // execute sql statment
    }
    
    public function update_order() {
        $pdo = connect_admin();

        $sql = "UPDATE orders
                SET orderDate = '$this["orderDate"]', requiredDate = '$this["requiredDate"]', shippedDate = '$this["shippedDate"]', status = '$this["status"]', comments = '$this["comments"]', customerNumber = '$this["customerNumber"]'
                WHERE orderNumber = '$this["orderNumber"]'"; // sql statementS

        $toSave = $pdo->prepare($sql); // prepared statement
        $toSave->execute(); // execute sql statment
    }

    public function get_details() {
        $pdo = connect_admin();

        $sql = "SELECT * FROM orderdetails
                WHERE orderNumber = '$this["orderNumber"]'"; // sql statementS

        $toDisplay = $pdo->prepare($sql); // prepared statement
        $toDisplay->execute(); // execute sql statment
        $result = $toDisplay->fetch();
        return $result;
    }
}

class OrderDetail {

    //properties

    public $orderdetail = ['orderNumber' => 0, 'productCode' => 'something', 'quantityOrdered' => 0, 'priceEach' = 0.0, 'orderLineNumber' = 0];

    //methods

    public function get_orderdetail() {
        $pdo = connect_admin();

        $sql = "SELECT * FROM orderdetails
                WHERE orderNumber = '$this["orderNumber"]'"; // sql statementS

        $toGet = $pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment
        $result = $toGet->fetch();

        return $result;
    }

    public function create_orderdetail() {
        $pdo = connect_admin();

        $sql = "INSERT INTO orderdetails (orderNumber, productCode, quantityOrdered, priceEach, orderLineNumber)
                VALUES '$this["orderNumber"]', '$this["productCode"]', '$this["quantityOrdered"]', '$this["priceEach"]', '$this["orderLineNumber"]'"; // sql statements

        $toCreate = $pdo->prepare($sql); // prepared statement
        $toCreate->execute(); // execute sql statment
    }
    
    public function update_orderdetail() {
        $pdo = connect_admin();

        $sql = "UPDATE orderdetails
                SET productCode = '$this["productCode"]', quantityOrdered = '$this["quantityOrdered"]', priceEach = '$this["priceEach"]', orderLineNumber = '$this["orderLineNumber"]'
                WHERE orderNumber = '$this["orderNumber"]'"; // sql statementS

        $toSave = $pdo->prepare($sql); // prepared statement
        $toSave->execute(); // execute sql statment
    }

}

?>