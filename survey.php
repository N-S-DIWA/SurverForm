<?php
// Allow cross-origin requests (optional if frontend and backend are separate)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the JSON data from the request
    $input = json_decode(file_get_contents("php://input"), true);

    if ($input) {
        // Access form fields
        $name = $input['name'] ?? '';
        $email = $input['email'] ?? '';
        $age = $input['number'] ?? '';
        $language = $input['code-lang'] ?? '';
        $employment = $input['gender'] ?? '';
        $os = $input['os1'] ?? [];
        $comments = $input['comments'] ?? '';

        // Example: Save data to a file (or connect to a database below)
        $file = fopen("survey_data.txt", "a");
        fwrite($file, "Name: $name, Email: $email, Age: $age, Language: $language, Employment: $employment, OS: " . implode(', ', $os) . ", Comments: $comments\n");
        fclose($file);

        // Respond back with success message
        echo json_encode(["message" => "Form submitted successfully!"]);
    } else {
        echo json_encode(["error" => "Invalid input"]);
    }
} else {
    echo json_encode(["error" => "Invalid request method"]);
}
?>
