<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IncomingProductsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IncomingProductsTable Test Case
 */
class IncomingProductsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\IncomingProductsTable
     */
    protected $IncomingProducts;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.IncomingProducts',
        'app.Products',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('IncomingProducts') ? [] : ['className' => IncomingProductsTable::class];
        $this->IncomingProducts = $this->getTableLocator()->get('IncomingProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->IncomingProducts);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\IncomingProductsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\IncomingProductsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
