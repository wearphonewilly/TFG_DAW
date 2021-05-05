<?php
namespace Melbahja\Seo\Interfaces;

/**
 * @package Melbahja\Seo
 * @since v1.0
 * @see https://git.io/phpseo 
 * @license MIT
 * @copyright 2019 Mohamed Elabhja 
 */
interface SitemapBuilderInterface extends SeoInterface
{
	/**
	 * Images namespace
	 */
	public const IMAGE_NS = 'http://www.google.com/schemas/sitemap-image/1.1';


	/**
	 * Videos namespace
	 */
	public const VIDEO_NS = 'http://www.google.com/schemas/sitemap-video/1.1';

	/**
	 * News namespace
	 * @var string
	 */
	public const NEWS_NS = 'https://www.google.com/schemas/sitemap-news/0.9';

	public function loc(string $path): SitemapBuilderInterface;

	public function lastMode($date): SitemapBuilderInterface;

	public function image(string $imageUrl, array $options = []): SitemapBuilderInterface;

	public function video(string $title, array $options = []): SitemapBuilderInterface;

	public function changefreq(string $freq): SitemapBuilderInterface;

	public function priority(string $priority): SitemapBuilderInterface;

	public function saveTo(string $path): bool;

	public function saveTemp(): string;
}
