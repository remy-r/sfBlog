<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostRepository")
 */
class Post
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="post_text", type="text")
     */
    private $postText;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=500)
     */
    private $titre;

    /**
     * @var PostState
     * @ORM\ManyToOne(targetEntity="PostState", inversedBy="posts")
     * @ORM\JoinColumn(name="id_post_state", referencedColumnName="id")
     */
    private $postState;

    /**
     * @var FosUser
     *
     * @ORM\ManyToOne(targetEntity="FosUser", inversedBy="posts")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     */
    private $user;
    
     /**
     * @Gedmo\Slug(fields={"titre"}, updatable=false)
     * @ORM\Column(length=255, unique=true)
     */
    protected $slug;

    /**
     * Post constructor.
     */
    public function __construct()
    {
        $this->createdAt = $this->updatedAt = new \DateTime("now");
    }

    /**
     * @ORM\PreUpdate
     */
    public function updated()
    {
        $this->updatedAt = new \DateTime("now");

    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Post
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Post
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set postText
     *
     * @param string $postText
     *
     * @return Post
     */
    public function setPostText($postText)
    {
        $this->postText = $postText;

        return $this;
    }

    /**
     * Get postText
     *
     * @return string
     */
    public function getPostText()
    {
        return $this->postText;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Post
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set postState
     *
     * @param PostState $postState
     *
     * @return Post
     */
    public function setPostState(PostState $postState = null)
    {
        $this->postState = $postState;

        return $this;
    }

    /**
     * Get postState
     *
     * @return PostState
     */
    public function getPostState()
    {
        return $this->postState;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\FosUser $user
     *
     * @return Post
     */
    public function setUser(\AppBundle\Entity\FosUser $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\FosUser
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Post
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
