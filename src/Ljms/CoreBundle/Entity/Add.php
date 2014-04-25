<?php
// src/Acme/TaskBundle/Entity/Task.php
namespace Ljms\CoreBundle\Entity;

class Add
{
    protected $FirstName;
    protected $Address;
    protected $State;
    protected $Email;
    protected $ConfirmEmail;
    protected $Password;
    protected $ConfirmPassword;
    protected $LastName;
    protected $City;
    protected $ZipCode;
    protected $HomePhone;
    protected $CellPhone;
    protected $AltPhone;
    protected $altFirstName;
    protected $altLastName;
    protected $altEmail;
    protected $altAltPhone;
    protected $Role;
    protected $AssignDivision;
    protected $AssignTeam;
    
    
    public function getFirstName()
    {
        return $this->FirstName;
    }
    public function setFirstName($FirstName)
    {
        $this->FirstName = $FirstName;
    }
    public function getAddress()
    {
        return $this->Address;
    }
    public function setAddress($Address)
    {
        $this->Address = $Address;
    }
    public function getState()
    {
        return $this->State;
    }
    public function setState($State)
    {
        $this->State = $State;
    }
    public function getEmail()
    {
        return $this->Email;
    }
    public function setEmail($Email)
    {
        $this->Email = $Email;
    }
    public function getConfirmEmail()
    {
        return $this->ConfirmEmail;
    }
    public function setConfirmEmail($ConfirmEmail)
    {
        $this->ConfirmEmail = $ConfirmEmail;
    }
    public function getPassword()
    {
        return $this->Password;
    }
    public function setPassword($Password)
    {
        $this->Password = $Password;
    }
    public function getConfirmPassword()
    {
        return $this->ConfirmPassword;
    }
    public function setConfirmPassword($ConfirmPassword)
    {
        $this->ConfirmPassword = $ConfirmPassword;
    }
    public function getLastName()
    {
        return $this->LastName;
    }
    public function setLastName($LastName)
    {
        $this->LastName = $LastName;
    }
    public function getCity()
    {
        return $this->City;
    }
    public function setCity($City)
    {
        $this->City = $City;
    }
    public function getZipCode()
    {
        return $this->ZipCode;
    }
    public function setZipCode($ZipCode)
    {
        $this->ZipCode = $ZipCode;
    }
    public function getHomePhone()
    {
        return $this->HomePhone;
    }
    public function setHomePhone($HomePhone)
    {
        $this->HomePhone = $HomePhone;
    }
    public function getCellPhone()
    {
        return $this->CellPhone;
    }
    public function setCellPhone($CellPhone)
    {
        $this->CellPhone = $CellPhone;
    }
    public function getAltPhone()
    {
        return $this->AltPhone;
    }
    public function setAltPhone($AltPhone)
    {
        $this->AltPhone = $AltPhone;
    }
    public function getaltFirstName()
    {
        return $this->altFirstName;
    }
    public function setaltFirstName($altFirstName)
    {
        $this->altFirstName = $altFirstName;
    }
    public function getaltLastName()
    {
        return $this->altLastName;
    }
    public function setaltLastName($altLastName)
    {
        $this->altLastName = $altLastName;
    }
    public function getaltEmail()
    {
        return $this->altEmail;
    }
    public function setaltEmail($altEmail)
    {
        $this->altEmail = $altEmail;
    }
    public function getaltAltPhone()
    {
        return $this->altAltPhone;
    }
    public function setaltAltPhone($altAltPhone)
    {
        $this->altAltPhone = $altAltPhone;
    }
    public function getRole()
    {
        return $this->Role;
    }
    public function setRole($Role)
    {
        $this->Role = $Role;
    }
    public function getAssignDivision()
    {
        return $this->AssignDivision;
    }
    public function setAssignDivision($AssignDivision)
    {
        $this->AssignDivision = $AssignDivision;
    }
    public function getAssignTeam()
    {
        return $this->AssignTeam;
    }
    public function setAssignTeam($AssignTeam)
    {
        $this->AssignTeam = $AssignTeam;
    }
}