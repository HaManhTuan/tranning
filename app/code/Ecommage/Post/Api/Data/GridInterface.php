<?php
/**
 * Grid GridInterface.
 * @category  Webkul
 * @package   Webkul_Grid
 * @author    Webkul
 * @copyright Copyright (c) 2010-2017 Webkul Software Private Limited (https://webkul.com)
 * @license   https://store.webkul.com/license.html
 */

namespace Ecommage\Post\Api\Data;

interface GridInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ID = 'id';
    const AUTHORID = 'author_id';
    const CONTENT = 'content';
    const STATUS = 'status';
   /**
    * Get EntityId.
    *
    * @return int
    */
    public function getId();
   /**
    * Set EntityId.
    */
    public function setId($id);
    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getAuthorId();
    /**
     * Set EntityId.
     */
    public function setAuthorId($author_id);
   /**
    * Get Content.
    *
    * @return varchar
    */
    public function getContent();
   /**
    * Set Content.
    */
    public function setContent($content);
   /**
    * Get IsActive.
    *
    * @return varchar
    */
    public function getStatus();
   /**
    * Set StartingPrice.
    */
    public function setStatus($status);
}
