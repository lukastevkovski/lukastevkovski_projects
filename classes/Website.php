<?php
class Website {
    private $conn;

    public $id;
    public $cover_image_url;
    public $main_title;
    public $subtitle;
    public $about;
    public $phone;
    public $location;
    public $type;
    public $service1_image_url;
    public $service1_description;
    public $service2_image_url;
    public $service2_description;
    public $service3_image_url;
    public $service3_description;
    public $company_description;
    public $linkedin_url;
    public $facebook_url;
    public $twitter_url;
    public $google_url;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        if ($this->conn === null) {
            throw new Exception("Database connection is null");
        }
        $query = "INSERT INTO websites (cover_image_url, main_title, subtitle, about, phone, location, type, service1_image_url, service1_description, service2_image_url, service2_description, service3_image_url, service3_description, company_description, linkedin_url, facebook_url, twitter_url, google_url) VALUES (:cover_image_url, :main_title, :subtitle, :about, :phone, :location, :type, :service1_image_url, :service1_description, :service2_image_url, :service2_description, :service3_image_url, :service3_description, :company_description, :linkedin_url, :facebook_url, :twitter_url, :google_url)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':cover_image_url', $this->cover_image_url);
        $stmt->bindParam(':main_title', $this->main_title);
        $stmt->bindParam(':subtitle', $this->subtitle);
        $stmt->bindParam(':about', $this->about);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':location', $this->location);
        $stmt->bindParam(':type', $this->type);
        $stmt->bindParam(':service1_image_url', $this->service1_image_url);
        $stmt->bindParam(':service1_description', $this->service1_description);
        $stmt->bindParam(':service2_image_url', $this->service2_image_url);
        $stmt->bindParam(':service2_description', $this->service2_description);
        $stmt->bindParam(':service3_image_url', $this->service3_image_url);
        $stmt->bindParam(':service3_description', $this->service3_description);
        $stmt->bindParam(':company_description', $this->company_description);
        $stmt->bindParam(':linkedin_url', $this->linkedin_url);
        $stmt->bindParam(':facebook_url', $this->facebook_url);
        $stmt->bindParam(':twitter_url', $this->twitter_url);
        $stmt->bindParam(':google_url', $this->google_url);

        return $stmt->execute();
    }

    public static function read($db, $id) {
        $query = "SELECT * FROM websites WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>