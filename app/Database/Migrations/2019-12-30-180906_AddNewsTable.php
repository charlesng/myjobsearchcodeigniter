<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddNewsTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'title'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'slug'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'body'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->addKey('slug', false);
		$this->forge->createTable('news');
	}

	public function down()
	{
		$this->forge->dropTable('news', true);
	}
}
