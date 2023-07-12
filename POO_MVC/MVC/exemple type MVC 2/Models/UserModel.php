<?php

namespace Models;

class UserModel extends BaseModel {
    static function getByEmail(string $email) {
        $db = static::connectToDB();

        // We use prepared statements to avoir SQL injections
        $stmt = $db->prepare('SELECT * FROM user WHERE email = ?');
        $stmt->execute([$email]);

        return $stmt->fetch();
    }
}
