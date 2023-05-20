<?php

class Database
{
    private string $host = "127.0.0.1";
    private int $port = 3306;
    private string $username = "root";
    private string $password = "";
    private string $dbName = "mydb";

    private $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO(
                'mysql:charset=utf8;host=' . $this->host . ';dbname=' . $this->dbName . ";port=" . $this->port,
                $this->username,
                $this->password
            );
        } catch (\Exception $exception) {
            echo $exception->getMessage();
            die();
        }
    }

    public function login(string $email, string $password): bool
    {
        $password = hash('sha256', $password);
        $sql = "SELECT COUNT(id) as count FROM users WHERE username = :email AND password = :password";

        try {
            $query = $this->connection->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
            $query->execute(["email" => $email, "password" => $password]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            die();
        }

        if ($result["count"] === 1) {
            return true;
        } else {
            return false;
        }
    }

    public function register_user(string $email, string $password)
    {
        // Skontrolujeme či už existuje účet s rovnakým emailom
        if ($this->validate_email($email) === false) {
            throw new Exception("Používateľ s rovnakým emailom už existuje.");
        }

        $password = hash('sha256', $password);
        $sql = "INSERT INTO users (username, password, is_admin) VALUES (?, ?, 0)";

        try {
            $query = $this->connection->prepare($sql);
            $query->execute([$email, $password]);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public function get_user_id(string $email): int
    {
        $sql = "SELECT id FROM users WHERE username = :email";

        try {
            $query = $this->connection->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
            $query->execute(["email" => $email]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            die();
        }

        return $result["id"];
    }

    public function validate_email(string $email): bool
    {
        $sql = "SELECT COUNT(id) as count FROM users WHERE username = :email";

        try {
            $query = $this->connection->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
            $query->execute(["email" => $email]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            die();
        }

        if ($result["count"] === 1) {
            return false;
        } else {
            return true;
        }
    }

    public function update_password(int $userid, string $new_password)
    {
        $password = hash('sha256', $new_password);
        $sql = "UPDATE users SET password = :password WHERE id = :id";

        try {
            $query = $this->connection->prepare($sql);
            $query->execute(["id" => $userid, "password" => $password]);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public function delete_account(int $userid)
    {
        $sql = "DELETE FROM users WHERE id = :id";

        try {
            $query = $this->connection->prepare($sql);
            $query->execute(["id" => $userid]);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public function is_admin(int $userid): bool
    {
        $sql = "SELECT is_admin FROM users WHERE id = :id";

        try {
            $query = $this->connection->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
            $query->execute(["id" => $userid]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            die();
        }

        return $result["is_admin"];
    }

    public function get_username_by_id(int $userid): string
    {
        $sql = "SELECT username FROM users WHERE id = :id";

        try {
            $query = $this->connection->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
            $query->execute(["id" => $userid]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            die();
        }

        return $result["username"];
    }

    public function get_competitions(): array
    {
        $sql = "SELECT * FROM competitions";

        try {
            $query = $this->connection->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            die();
        }

        return $result;
    }

    public function get_signup_count(int $userid): int
    {
        $sql = "SELECT COUNT(user) as count FROM competition_players WHERE user = :id";

        try {
            $query = $this->connection->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
            $query->execute(["id" => $userid]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            die();
        }

        return $result["count"];
    }

    public function is_signed_up(int $userid, int $competition_id): bool
    {
        $sql = "SELECT COUNT(*) as count FROM competition_players WHERE user = :id AND competition = :competition";

        try {
            $query = $this->connection->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
            $query->execute(["id" => $userid, "competition" => $competition_id]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            die();
        }

        if ($result["count"] === 1) {
            return true;
        } else {
            return false;
        }
    }

    public function signup_competition(int $userid, int $competition_id)
    {
        $sql = "INSERT INTO competition_players (competition, user) VALUES (?, ?)";

        try {
            $query = $this->connection->prepare($sql);
            $query->execute([$competition_id, $userid]);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public function leave_competition(int $userid, int $competition_id)
    {
        $sql = "DELETE FROM competition_players WHERE competition = :competition AND user = :id";

        try {
            $query = $this->connection->prepare($sql);
            $query->execute(["competition" => $competition_id, "id" => $userid]);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public function create_competition(string $name, string $description, DateTime $datetime, string $place, int $organizer)
    {
        $datetime = $datetime->format('Y-m-d H:i:s');
        $sql = "INSERT INTO competitions (name, description, time, place, organizer) VALUES (?, ?, ?, ?, ?)";

        try {
            $query = $this->connection->prepare($sql);
            $query->execute([$name, $description, $datetime, $place, $organizer]);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public function delete_competition(int $competition_id)
    {
        $sql = "DELETE FROM competitions WHERE id = :id";

        try {
            $query = $this->connection->prepare($sql);
            $query->execute(["id" => $competition_id]);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            die();
        }

        $sql = "DELETE FROM competition_players WHERE competition = :id";

        try {
            $query = $this->connection->prepare($sql);
            $query->execute(["id" => $competition_id]);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public function edit_competition(int $competition_id, string $name, string $description, DateTime $datetime, string $place, int $organizer)
    {
        $sql = "UPDATE competitions SET name = :name, description = :description, time = :time, place = :place, organizer = :organizer WHERE id = :id";
        $datetime = $datetime->format('Y-m-d H:i:s');

        try {
            $query = $this->connection->prepare($sql);
            $query->execute(
                [
                    "id" => $competition_id,
                    "name" => $name,
                    "description" => $description,
                    "time" => $datetime,
                    "place" => $place,
                    "organizer" => $organizer
                ]
            );
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            die();
        }
    }
}