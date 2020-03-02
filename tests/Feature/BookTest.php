<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase
{
    /**
     * Consumer 1
     *
     * Given​ ​I​ ​am​ ​an​ ​api​ ​consumer
     * When​ ​I​ ​filter​ ​by​ ​author​ ​“Robin​ ​Nixon”
     * Then​ ​I​ ​should​ ​receive​ ​a​ ​200​ ​response
     * And​ ​the​ ​body​ ​should​ ​contain​ ​two​ ​results
     * And​ ​the​ ​body​ ​should​ ​contain​ ​“​978-1491918661”
     * And​ ​the​ ​body​ ​should​ ​contain​ ​“978-0596804848”
     *
     * @return void
     */
    public function testConsumer1()
    {
        $this->json('GET', '/api/book', ["author" => "Robin Nixon"], [])
            ->assertStatus(200)
            ->assertJsonCount(2, "data")
            ->assertJsonFragment(["978-1491918661"])
            ->assertJsonFragment(["978-0596804848"]);
    }

    /**
     * Consumer 2
     *
     * Given​ ​I​ ​am​ ​an​ ​api​ ​consumer
     * When​ ​I​ ​filter​ ​by​ ​author​ ​"Christopher​ ​Negus"
     * Then​ ​I​ ​should​ ​receive​ ​a​ ​200​ ​response
     * And​ ​the​ ​body​ ​should​ ​contain​ ​one​ ​result
     * And​ ​the​ ​body​ ​should​ ​contain​ ​“​978-1118999875”
    */
    public function testConsumer2()
    {
        $this->json('GET', '/api/book', ["author" => "Christopher Negus"], [])
            ->assertStatus(200)
            ->assertJsonCount(1, "data")
            ->assertJsonFragment(["978-1118999875"]);
    }

    /**
     * Consumer 3
     *
     * Given​ ​I​ ​am​ ​an​ ​api​ ​consumer
     * When​ ​I​ ​query​ ​the​ ​api​ ​for​ ​a​ ​list​ ​of​ ​categories Then​ ​I​ ​should​ ​receive​ ​a​ ​200​ ​response
     * And​ ​the​ ​body​ ​should​ ​contain​ ​three​ ​results And​ ​the​ ​body​ ​should​ ​contain​ ​“PHP”
     * And​ ​the​ ​body​ ​should​ ​contain​ ​“Javascript” And​ ​the​ ​body​ ​should​ ​contain​ ​“Linux”
     */
    public function testConsumer3()
    {
        $this->json('GET', '/api/category', [], [])
            ->assertStatus(200)
            ->assertJsonCount(3, "data")
            ->assertJsonFragment(["PHP"])
            ->assertJsonFragment(["Linux"]);
    }

    /**
     * Consumer 4
     *
     * Given​ ​I​ ​am​ ​an​ ​api​ ​consumer
     * When​ ​I​ ​filter​ ​by​ ​category​ ​“Linux”
     * Then​ ​I​ ​should​ ​receive​ ​a​ ​200​ ​response
     * And​ ​the​ ​body​ ​should​ ​contain​ ​two​ ​results
     * And​ ​the​ ​body​ ​should​ ​contain​ ​“​978-0596804848”
     * And​ ​the​ ​body​ ​should​ ​contain​ ​“978-1118999875”
     */
    public function testConsumer4()
    {
        $this->json('GET', '/api/book', ["category" => ["Linux"]], [])
            ->assertStatus(200)
            ->assertJsonCount(2, "data")
            ->assertJsonFragment(["978-0596804848"])
            ->assertJsonFragment(["978-1118999875"]);
    }

    /**
     * Consumer 5
     *
     * Given​ ​I​ ​am​ ​an​ ​api​ ​consumer
     * When​ ​I​ ​filter​ ​by​ ​category​ ​“PHP”
     * Then​ ​I​ ​should​ ​receive​ ​a​ ​200​ ​response
     * And​ ​the​ ​body​ ​should​ ​contain​ ​one​ ​result
     * And​ ​the​ ​body​ ​should​ ​contain​ ​“​978-1491918661”
    */
    public function testConsumer5()
    {
        $this->json('GET', '/api/book', ["category" => ["PHP"]], [])
            ->assertStatus(200)
            ->assertJsonCount(1, "data")
            ->assertJsonFragment(["978-1491918661"]);
    }

    /**
     * Consumer 6
     *
     * Given​ ​I​ ​am​ ​an​ ​api​ ​consumer
     * When​ ​I​ ​filter​ ​by​ ​author​ ​“Robin​ ​Nixon”
     * And​ ​I​ ​filter​ ​by​ ​category​ ​“Linux”
     * Then​ ​I​ ​should​ ​receive​ ​a​ ​200​ ​response
     * And​ ​the​ ​body​ ​should​ ​contain​ ​one​ ​result
     * And​ ​the​ ​body​ ​should​ ​contain​ ​“978-0596804848”
    */
    public function testConsumer6()
    {
        $this->json('GET', '/api/book', ["author" => "Robin Nixon", "category" => ["Linux"]], [])
            ->assertStatus(200)
            ->assertJsonCount(1, "data")
            ->assertJsonFragment(["978-0596804848"]);
    }

    /**
     * Consumer 7
     *
     * Given​ ​I​ ​am​ ​an​ ​api​ ​consumer
     * When​ ​I​ ​create​ ​the​ ​following​ ​book
     *
     * ISBN: 978-1491905012
     * Title: Modern​ ​PHP: New​ ​Features and​ ​Good Practices
     * Author: Josh​ ​Lockhart
     * Category: PHP
     * Price: 18.99​ ​GBP
     *
     * Then​ ​I​ ​should​ ​receive​ ​a​ ​201​ ​response
     * And​ ​the​ ​body​ ​should​ ​contain​ ​“978-1491905012”
     * And​ ​the​ ​body​ ​should​ ​contain​ ​“​Modern​ ​PHP:​ ​New​ ​Features​ ​and​ ​Good​ ​Practices​”
     * And​ ​the​ ​body​ ​should​ ​contain​ ​“​Josh​ ​Lockhart​”
     * And​ ​the​ ​body​ ​should​ ​contain​ ​“​PHP​”
     * And​ ​the​ ​body​ ​should​ ​contain​ ​“​18.99​”
    */
    public function testConsumer7()
    {
        $this->json('POST', '/api/book', [
                    "ISBN" => "978-1491905012",
                    "Title" => "Modern PHP: New Features and Good Practices",
                    "Author" => "Josh Lockhart",
                    "Category" => "PHP",
                    "Price" => "18.99​ ​GBP"
            ], [])
            ->assertStatus(201)
            ->assertJsonFragment(["978-1491905012"])
            ->assertJsonFragment(["Modern PHP: New Features and Good Practices"])
            ->assertJsonFragment(["Josh Lockhart"])
            ->assertJsonFragment(["PHP"])
            ->assertJsonFragment(["18.99 GBP"]);
    }

    /**
     * Consumer 8
     *
     * Given​ ​I​ ​am​ ​an​ ​api​ ​consumer When​ ​I​ ​create​ ​the​ ​following​ ​book
     *
     * ISBN: 978-INVALID-ISB N-1491905012
     * Title: Modern​ ​PHP: New​ ​Features and​ ​Good Practices
     * Author: Josh​ ​Lockhart
     * Category: PHP
     * Price: 18.99​ ​GBP
     *
     * Then​ ​I​ ​should​ ​receive​ ​a​ ​400​ ​response
     * And​ ​the​ ​body​ ​should​ ​contain​ ​“Invalid​ ​ISBN”
    */
    public function testConsumer8()
    {
        $this->json('POST', '/api/book', [
                "ISBN" => "978-INVALID-ISB N-1491905012",
                "Title" => "Modern PHP: New Features and Good Practices",
                "Author" => "Josh​ ​Lockhart",
                "Category" => "PHP",
                "Price" => "18.99​ ​GBP"
            ], [])
            ->assertStatus(400)
            ->assertJsonFragment(["Invalid​ ​ISBN"]);
    }
}
