<?php


namespace App\Entity;


use DateTime;
use PhpParser\Builder\Property;
use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $firstname;


    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $lastname;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $objet;

    /**
     * @return string|null
     */
    public function getObjet(): ?string
    {
        return $this->objet;
    }

    /**
     * @param string|null $objet
     */
    public function setObjet(?string $objet): void
    {
        $this->objet = $objet;
    }

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Regex(
     * pattern="/[0-9]{10}/"
     * )
     */
    private $phone;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string|null
     * @Assert\NotBlank(message="Entrer au moins 10 caractères")
     * @Assert\Length(min=1)
     */
    private $message;

    /**
     * @var string|null
     */
    private $societe;

    /**
     * @var string|null
     */
    private $budget;

    /**
 * @var string|null
 */
    private $politique;

    /**
     * @var DateTime|null
     */
    private $bookingDate;

    /**
     * @return DateTime|null
     */
    public function getBookingDate(): ?DateTime
    {
        return $this->bookingDate;
    }

    /**
     * @param DateTime|null $bookingDate
     */
    public function setBookingDate(?DateTime $bookingDate): void
    {
        $this->bookingDate = $bookingDate;
    }






    /**
     * @return string|null
     */
    public function getPolitique(): ?string
    {
        return $this->politique;
    }

    /**
     * @param string|null $politique
     */
    public function setPolitique(?string $politique): void
    {
        $this->politique = $politique;
    }

    /**
     * @var string|null
     */
    private $datesouhaitee;

    /**
     * @var string|null
     */
    private $descrioptionprojet;

    /**
     * @return string|null
     */
    public function getSociete(): ?string
    {
        return $this->societe;
    }

    /**
     * @param string|null $societe
     */
    public function setSociete(?string $societe): void
    {
        $this->societe = $societe;
    }

    /**
     * @return string|null
     */
    public function getBudget(): ?string
    {
        return $this->budget;
    }

    /**
     * @param string|null $budget
     */
    public function setBudget(?string $budget): void
    {
        $this->budget = $budget;
    }

    /**
     * @return string|null
     */
    public function getDatesouhaitee(): ?string
    {
        return $this->datesouhaitee;
    }

    /**
     * @param string|null $datesouhaitee
     */
    public function setDatesouhaitee(?string $datesouhaitee): void
    {
        $this->datesouhaitee = $datesouhaitee;
    }

    /**
     * @return string|null
     */
    public function getDescrioptionprojet(): ?string
    {
        return $this->descrioptionprojet;
    }

    /**
     * @param string|null $descrioptionprojet
     */
    public function setDescrioptionprojet(?string $descrioptionprojet): void
    {
        $this->descrioptionprojet = $descrioptionprojet;
    }

    /**
     * @var Property|null
     */
    private $property;

    /**
     * @return Property|null
     */
    public function getProperty(): ?Property
    {
        return $this->property;
    }

    /**
     * @param Property|null $property
     */
    public function setProperty(?Property $property): void
    {
        $this->property = $property;
    }



    /**
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string|null $firstname
     */
    public function setFirstname(?string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string|null
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string|null $lastname
     */
    public function setLastname(?string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }
}