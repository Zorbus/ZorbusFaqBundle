<?php

namespace Zorbus\FaqBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zorbus\FaqBundle\Entity\Item
 */
class Item extends Base\Item
{

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $question
     */
    private $question;

    /**
     * @var string $answer
     */
    private $answer;

    /**
     * @var string $image
     */
    private $image;

    /**
     * @var boolean $enabled
     */
    private $enabled;

    /**
     * @var integer $position
     */
    private $position;

    /**
     * @var string $slug
     */
    private $slug;

    /**
     * @var \DateTime $created_at
     */
    private $created_at;

    /**
     * @var \DateTime $updated_at
     */
    private $updated_at;

    /**
     * @var Zorbus\FaqBundle\Entity\Faq
     */
    private $menu;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set question
     *
     * @param string $question
     * @return Item
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set answer
     *
     * @param string $answer
     * @return Item
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return string
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Item
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Item
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Item
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Item
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

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Item
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return Item
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set menu
     *
     * @param Zorbus\FaqBundle\Entity\Faq $menu
     * @return Item
     */
    public function setMenu(\Zorbus\FaqBundle\Entity\Faq $menu = null)
    {
        $this->menu = $menu;

        return $this;
    }

    /**
     * Get menu
     *
     * @return Zorbus\FaqBundle\Entity\Faq
     */
    public function getMenu()
    {
        return $this->menu;
    }

    /**
     * @var Zorbus\FaqBundle\Entity\Faq
     */
    private $faq;

    /**
     * Set faq
     *
     * @param Zorbus\FaqBundle\Entity\Faq $faq
     * @return Item
     */
    public function setFaq(\Zorbus\FaqBundle\Entity\Faq $faq = null)
    {
        $this->faq = $faq;

        return $this;
    }

    /**
     * Get faq
     *
     * @return Zorbus\FaqBundle\Entity\Faq
     */
    public function getFaq()
    {
        return $this->faq;
    }

    /**
     * @ORM\PrePersist
     */
    public function preImageUpload()
    {
        if (null !== $this->imageTemp)
        {
            $this->image = sha1(uniqid(mt_rand(), true)) . '.' . $this->imageTemp->guessExtension();
        }
    }

    /**
     * @ORM\PostRemove
     */
    public function postRemove()
    {
        if ($file = $this->getAbsolutePath($this->image))
        {
            @unlink($file);
        }
    }

    /**
     * @ORM\PostPersist
     */
    public function postImageUpload()
    {
        if ($this->imageTemp instanceof \Symfony\Component\HttpFoundation\File\UploadedFile)
        {
            $this->imageTemp->move($this->getUploadRootDir(), $this->image);

            unset($this->imageTemp);
        }
    }

}