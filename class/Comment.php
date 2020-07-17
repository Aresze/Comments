<?php
Class Comment{
    private $_id;
    private $_login;
    private $_comment;
    private $_parrent;

    /**
     * Comment constructor.
     * @param int $id
     * @param string $comment
     * @param int $parrent
     * @param string $login
     */
    public function __construct($id, $login, $comment, $parrent)
    {
        $this->_id = $id;
        $this->_login = $login;
        $this->_comment = $comment;
        $this->_parrent = $parrent;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->_comment;
    }

    /**
     * @return int
     */
    public function getParrent()
    {
        return $this->_parrent;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->_login;
    }

}

Class Comments
{
    private $_comment = array();

    /**
     * @return array
     */
    public function getComment()
    {
        return $this->_comment;
    }

    /**
     * @param array $comment
     */
    public function setComment($id, $login, $comment, $parrent)
    {
        $this->_comment[] = new Comment($id, $login, $comment, $parrent);
    }
}

?>
