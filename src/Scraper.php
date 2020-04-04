<?php

namespace Pilipinews\Website\Philstar;

use Pilipinews\Common\Article;
use Pilipinews\Common\Interfaces\ScraperInterface;
use Pilipinews\Common\Scraper as AbstractScraper;

/**
 * Philippine Star Scraper
 *
 * @package Pilipinews
 * @author  Rougin Gutib <rougingutib@gmail.com>
 */
class Scraper extends AbstractScraper implements ScraperInterface
{
    /**
     * @var string[]
     */
    protected $removables = array('#related_block');

    /**
     * Returns the contents of an article.
     *
     * @param  string $link
     * @return \Pilipinews\Common\Article
     */
    public function scrape($link)
    {
        $this->prepare((string) $link);

        $this->remove((array) $this->removables);

        $title = $this->title('#sports_title');

        $body = $this->body('#sports_article_writeup');

        $html = $this->html($body);

        return new Article($title, $html, $link);
    }
}
