<?php
namespace Entities;

/**
 * @Entity(repositoryClass="Repositories\ProductRepository")
 * @Table(name="product")
 **/
class Product {
    /**
     * @Id @Column(type="integer", nullable=false) @GeneratedValue(strategy="AUTO")
     * @var int
     */
    protected $id;

    /**
     * @Column(type="string", length=80, nullable=false)
     * @var string
     */
    protected $name;
    /**
     * @Column(type="string", length=80, nullable=true)
     * @var string
     */
    protected $gioitinh;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Gets the value of gioitinh.
     *
     * @return string
     */
    public function getGioitinh()
    {
        return $this->gioitinh;
    }

    /**
     * Sets the value of gioitinh.
     *
     * @param string $gioitinh the gioitinh
     *
     * @return self
     */
    public function setGioitinh($gioitinh)
    {
        $this->gioitinh = $gioitinh;

        return $this;
    }
}
