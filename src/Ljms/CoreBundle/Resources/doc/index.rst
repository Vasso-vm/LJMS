/*Ljms\CoreBundle\Entity\AltContact:
   type: Entity
   table: altContact
   id:
      id:
          type: integer
          generator: { strategy: AUTO }
   fields:
      profileId:
          type: integer
          unique: true
      altFirstName:
          type: string
          length: 100
          nulable: true
      altLastName:
          type: string
          length: 100
          nulable: true
      altEmail:
          type: string
          length: 100
          nulable: true
      altPhone:
          type: string
          length: 20
          nulable: true*/