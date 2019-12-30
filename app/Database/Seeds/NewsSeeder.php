<?php

namespace App\Database\Seeds;

class NewsSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $this->db->query("INSERT INTO news VALUES
        (1,'Elvis sighted','elvis-sighted','Elvis was sighted at the Podunk internet cafe. It looked like he was writing a CodeIgniter app.'),
        (2,'Say it isn\'t so!','say-it-isnt-so','Scientists conclude that some programmers have a sense of humor.'),
        (3,'Caffeination, Yes!','caffeination-yes','World\'s largest coffee shop open onsite nested coffee shop for staff only.')");
    }
}
