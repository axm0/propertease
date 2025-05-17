<?php

require_once __DIR__ . '/../Core/Controller.php';
if (file_exists(__DIR__ . '/../../config/config.php')) {
    require_once __DIR__ . '/../../config/config.php';
} else {
    die('Failed to load configuration file');
}


class ViewPropertiesController extends Controller {
    public function index() {
        $images = $this->getAllProperties();
        $states = $this->getDistinctValues('State');
        $propertyTypes = $this->getDistinctValues('PropertyType');
        $this->view('viewProperties', [
            'images' => $images,
            'states' => $states,
            'propertyTypes' => $propertyTypes
        ]);
    }

    private function getAllProperties($filters = []) {
        $sql = "SELECT p.PropertyURL, pr.PropertyID, pr.Address, pr.Description, pr.State, pr.ZipCode, pr.Price, pr.NumberBedrooms, pr.NumberBathrooms, pr.PropertyType
                FROM Property pr
                LEFT JOIN Photos p ON pr.PropertyID = p.PropertyID";

        $conditions = [];
        $params = [];

        foreach ($filters as $column => $value) {
            if (!empty($value)) {
                $conditions[] = "$column = ?";
                $params[] = $value;
            }
        }

        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }

        $sql .= " ORDER BY pr.PropertyID";

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->get_result();

        $images = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $images[$row['PropertyID']]['images'][] = $row['PropertyURL'];
                $images[$row['PropertyID']]['address'] = $row['Address'];
                $images[$row['PropertyID']]['description'] = $row['Description'];
                $images[$row['PropertyID']]['state'] = $row['State'];
                $images[$row['PropertyID']]['zipCode'] = $row['ZipCode'];
                $images[$row['PropertyID']]['price'] = $row['Price'];
                $images[$row['PropertyID']]['bedrooms'] = $row['NumberBedrooms'];
                $images[$row['PropertyID']]['bathrooms'] = $row['NumberBathrooms'];
                $images[$row['PropertyID']]['propertyType'] = $row['PropertyType'];
            }
        }

        return $images;
    }

    private function getDistinctValues($column) {
        $sql = "SELECT DISTINCT $column FROM Property ORDER BY $column";
        $result = $this->db->query($sql);
        $values = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $values[] = $row[$column];
            }
        }
        return $values;
    }

    public function filter() {
        $filters = [
            'State' => $_GET['state'] ?? '',
            'ZipCode' => $_GET['zipCode'] ?? '',
            'PropertyType' => $_GET['propertyType'] ?? '',
            'NumberBedrooms' => $_GET['bedrooms'] ?? '',
            'NumberBathrooms' => $_GET['bathrooms'] ?? ''
        ];

        $images = $this->getAllProperties($filters);
        $states = $this->getDistinctValues('State');
        $propertyTypes = $this->getDistinctValues('PropertyType');

        $this->view('viewProperties', [
            'images' => $images,
            'states' => $states,
            'propertyTypes' => $propertyTypes,
            'selectedFilters' => $filters
        ]);
    }
    public function search() {
        $query = $_GET['query'];
        $likeQuery = '%' . $query . '%';

        $sql = "SELECT Property.*, Photos.PropertyURL FROM Property
            LEFT JOIN Photos ON Property.PropertyID = Photos.PropertyID
            WHERE Property.Address LIKE ? OR Property.ZipCode LIKE ?";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $likeQuery, $likeQuery);
        $stmt->execute();
        $result = $stmt->get_result();

        $properties = [];
        while ($row = $result->fetch_assoc()) {
            $properties[$row['PropertyID']]['details'] = $row;
            $properties[$row['PropertyID']]['images'][] = $row['PropertyURL'];
        }

        $stmt->close();

        $this->view('searchResults', ['properties' => $properties, 'query' => $query]);
    }
}