<?php
require 'library/vendor/autoload.php';

function extractTextFromPDF($filePath) {
    $parser = new \Smalot\PdfParser\Parser();
    $pdf = $parser->parseFile($filePath);
    return $pdf->getText();
}
function rateCV($file, $jobDescription) {
    $apiKey = 'AIzaSyB-tI5qAO-zEHDzAKH5VtuU7cpUmsr_yF0'; 


    $endpoint = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key={$apiKey}";
    $cvText = extractTextFromPDF($file);

    $data = [
            'contents' => [
                [
                    'role' => 'user',
                    'parts' => [
                        [
                            'text' => "Rate this CV's relevance to the job description on a scale of 1-100. Dont give me anything just return the score
                                      Job Description: $jobDescription 
                                      CV Content: $cvText"
                        ]
                    ]
                ]
            ]
        ];


    $ch = curl_init($endpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);
    $response = curl_exec($ch);


    $responseData = json_decode($response, true);
    return $responseData['candidates'][0]['content']['parts'][0]['text'];
}
