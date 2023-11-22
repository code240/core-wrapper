<?php 

/**
 * Database class for executing common database operations (SELECT, INSERT, UPDATE, DELETE).
 *
 * This class provides static methods for executing common database operations such as SELECT, INSERT, UPDATE, and DELETE.
 * It uses a MySQLi connection for database interaction. The connection parameters are typically set in a configuration file.
 *
 * @category Database
 */
class Database
{   
    /**
     * Establish a database connection.
     *
     * @param string $servername The server name or IP address of the database server.
     * @param string $username The username used to connect to the database server.
     * @param string $password The password used to connect to the database server.
     * @param string $dbname The name of the database to connect to.
     */
    public static function connect(string $servername = _DB_SERVER,string $username = _USERNAME, string $password = _PASSWORD, string $dbname = _DATABASE)
    {
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            return false;
        }
        return $conn;
    }
    /**
     * Execute a SELECT query.
     *
     * @param string $q The SELECT query to execute.
     *
     * @return array|false Returns an array representing the result set if the query was successful, or false on failure.
     *                    The array is an associative array containing the selected rows, or an empty array if no rows were selected.
     *                    Each element in the array is an associative array representing a row in the result set.
     *                    Returns false if there was an error executing the query or if the query is not a SELECT query.
     */
    public static function select(string $q)
    {
        $q = trim($q);
        if (stripos($q, 'SELECT') !== 0) {
            return array('status'=> false, 'error' => 'Only SELECT queries are allowed.');
        }
        $con = self::connect();
        $result = $con->query($q);
        if (!$result) {
            return array('status'=> false, 'error' => 'Error executing query: ' . $con->error);
        }
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $output[] = $row;
            }
        }
        $con->close();
        return $output;
    }
    /**
     * Execute an INSERT query.
     *
     * @param string $q The INSERT query to execute.
     *
     * @return array Returns an associative array with status information:
     *               - 'status' (bool): true if the insertion was successful, false otherwise.
     *               - 'success' (string): Success message if the insertion was successful.
     *               - 'insert_id' (int|null): The ID generated for an AUTO_INCREMENT column if an insert was successful, null otherwise.
     *               - 'error' (string|null): Error message if an error occurred during execution, null otherwise.
    */
    public static function insert($q) {
        $q = trim($q);
        if (stripos($q, 'INSERT') !== 0) {
            return array('status'=> false,'error' => 'Only INSERT queries are allowed.');
        }
        $con = self::connect();
        $result = $con->query($q);
        if (!$result) {
            return array('status'=> false,'error' => 'Error executing query: ' . $con->error);
        }
        $insertId = $con->insert_id;
        $con->close();
        return array('status'=> true,'success' => 'Insertion successful', 'insert_id' => $insertId);
    }
    /**
     * Execute a DELETE query.
     *
     * @param string $q The DELETE query to execute.
     *
     * @return array Returns an associative array with status information:
     *               - 'status' (bool): true if the deletion was successful, false otherwise.
     *               - 'success' (string): Success message if the deletion was successful.
     *               - 'affected_rows' (int): The number of rows affected by the DELETE query.
     *               - 'error' (string|null): Error message if an error occurred during execution, null otherwise.
     */
    public static function delete($q) {
        $q = trim($q);
        if (stripos($q, 'DELETE') !== 0) {
            return array('status'=> false,'error' => 'Only DELETE queries are allowed.');
        }
    
        $con = self::connect();
        $result = $con->query($q);
    
        if (!$result) {
            return array('status'=> false,'error' => 'Error executing query: ' . $con->error);
        }
        $affectedRows = $con->affected_rows;
        $con->close();
        return array('status'=> true,'success' => 'Delete successful', 'affected_rows' => $affectedRows);
    }
    /**
     * Execute an UPDATE query.
     *
     * @param string $q The UPDATE query to execute.
     *
     * @return array Returns an associative array with status information:
     *               - 'status' (bool): true if the update was successful, false otherwise.
     *               - 'success' (string): Success message if the update was successful.
     *               - 'affected_rows' (int): The number of rows affected by the UPDATE query.
     *               - 'error' (string|null): Error message if an error occurred during execution, null otherwise.
     */
    public static function update($q) {
        $q = trim($q);
        if (stripos($q, 'UPDATE') !== 0) {
            return array('status'=> false,'error' => 'Only UPDATE queries are allowed.');
        }
        $con = self::connect();
        $result = $con->query($q);
        if (!$result) {
            return array('status'=> false,'error' => 'Error executing query: ' . $con->error);
        }
        $affectedRows = $con->affected_rows;
        $con->close();
        return array('status'=> true,'success' => 'Update successful', 'affected_rows' => $affectedRows);
    }
    
}



