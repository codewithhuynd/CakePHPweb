<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BorrowsFixture
 */
class BorrowsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'book_id' => 1,
                'borrow_date' => '2026-04-05',
                'return_date' => '2026-04-05',
                'status' => 'Lorem ipsum dolor sit amet',
                'created' => '2026-04-05 15:53:11',
                'modified' => '2026-04-05 15:53:11',
            ],
        ];
        parent::init();
    }
}
