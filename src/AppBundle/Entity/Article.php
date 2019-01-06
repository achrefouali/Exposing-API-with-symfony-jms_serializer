<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Article
 * The following annotations tells the serializer to skip all properties which
 * have not marked with "@Expose".
 *@Serializer\ExclusionPolicy("ALL")
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     *  @Serializer\Expose // This annotation can be defined on a property to indicate that the property
     * should be serialized/unserialized. Works only in combination with AllExclusionPolicy.
     * the following annotation tells the serializer that this propertie is attached to the group
     * @Serializer\Groups({"list","overview"})//This annotation can be defined on a property to specify if the property
     * should be serialized when only serializing specific groups
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * The following annotations tells the serializer to expose this propertie
     * @Serializer\Expose
     * the following annotation tells the serializer that this propertie is attached to the group
     *@Serializer\Groups({"detail", "list"})
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     * @Serializer\Expose
     * the following annotation tells the serializer that this propertie is attached to the group
     * @Serializer\Groups({"detail", "list","overview"})
     * @ORM\Column(name="content", type="string", length=255)
     */
    private $content;


    /**
     * @var string
     * @ORM\Column(name="description2", type="string", length=255)
     * @Serializer\Expose
     * @Serializer\Groups({"detail","overview"})
     *@Serializer\SerializedName("Second_description_of_article ")
     */
    private $description2 ;


    /**
     * @var string
     * @ORM\Column(name="description", type="string", length=255)
     * @Serializer\Expose
     * @Serializer\SkipWhenEmpty // This annotation can be defined on a property to indicate that the property should not be serialized if the result will be ?empty?.
      *Works option works only when serializing.
     * @Serializer\Groups({"detail"})
     *@Serializer\SerializedName("First_description_of_article ")
     */
    private $description;



    /**
     * @return string
     */
    public function getDescription2()
    {
        return $this->description2;
    }

    /**
     * @param string $description2
     */
    public function setDescription2($description2)
    {
        $this->description2 = $description2;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
     * Set title
     *
     * @param string $title
     *
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Article
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
}

