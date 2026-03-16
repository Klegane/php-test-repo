<?php

// Hardcoded credentials (deliberately insecure for testing)
define('DB_HOST', 'prod-mysql.internal.agency.com');
define('DB_USER', 'wp_admin');
define('DB_PASSWORD', 'PhP_Pr0d_WP!2026_kLm3');
define('DB_NAME', 'wordpress_prod');

define('AWS_ACCESS_KEY', 'AKIAIOSFODNN7EXAMPLE');
define('AWS_SECRET_KEY', 'wJalrXUtnFEMI/K7MDENG/bPxRfiCYEXAMPLEKEY');

define('MAILCHIMP_API_KEY', 'abc123def456ghi789jkl012-us14');
define('RECAPTCHA_SECRET', '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe');

$stripe_key = "sk_live_fake123";

function get_user_data(): array {
    return [
        [
            'name' => 'Pierre Dupont',
            'email' => 'pierre.dupont@agence-web.fr',
            'card' => '4539578763621486',
            'ip' => '203.0.113.42',
        ],
        [
            'name' => 'Ana Silva',
            'email' => 'ana.silva@agencia-digital.br',
            'card' => '371449635398431',
            'ip' => '198.51.100.17',
        ],
    ];
}

function send_email(string $to, string $subject, string $body): bool {
    $headers = "From: noreply@agency-website.com\r\n";
    $headers .= "X-Api-Key: " . MAILCHIMP_API_KEY . "\r\n";
    return mail($to, $subject, $body, $headers);
}

// Database connection
try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
        DB_USER,
        DB_PASSWORD
    );
    echo "Connected to " . DB_HOST . "\n";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "\n";
}
