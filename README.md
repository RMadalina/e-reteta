e-Reteta
========

Aplicatia realizeaza managementul clinicilor, medicilor, retetelor si pacientilor.


Schema Bazei de Date
--------------------
In figura urmatoare este prezentata schema bazei de date:
![Schema Bazei de date](doc/images/db_reteta_oracle.png "Schema Bazei de Date")


Descrierea Aplicatiei
---------------------
Aplicatia permite inregistrarea si apoi logarea unui Administrator(admin@admin.com, parola:secret) care realizeaza gestiunea clinicilor, medicilor, pacientilor, medicamentelor, dar editeaza si rapoarte referitoare la toti de mai sus.  

![Login](doc/images/login.png "Logarea in aplicatie")












Gestiunea clinicilor
--------------------------
In imaginea urmatoare este prezentata gestiunea clinicilor:

![Login](doc/images/clinici_gestiune.png "Lista clinicilor")

Administratorul poate adauga clinici noi, le poate edita si le poate sterge.
















Editarea unei clinici
------------------------------
In imaginea urmatoare este prezentata editarea unei clinici:

![Login](doc/images/clinici_editare.png "Editarea unei clinici")





Stergerea unei clinici
-----------------------------
In imaginea urmatoare este prezentata stergerea unei clinici:

![Login](doc/images/clinici_stergere.png "Stergerea unei clinici")














Atat medicii cat si pacientii sunt in primul rand inregistrati ca User(cu nume, email, parola si rol), apoi in tabelele proprii au campuri separate care ii identifica(Medici: Cod Stampila si Contract CAS)



![Login](doc/images/medici_adaugare.png "Adaugarea unui medic")


Gestiunea medicilor
------------------------
In imaginea urmatoare este prezentata lista medicilor:

![Login](doc/images/medici_gestiune.png "Gestiunea medicilor")










Editarea unui medic
------------------------
In imaginea urmatoare este prezentata editarea medicilor:

![Login](doc/images/medici_editare.png "Editarea medicilor")














Gestiunea medicamentelor
------------------------
In imaginea urmatoare este prezentata lista medicamentelor:

![Login](doc/images/medicamente_gestiune.png "Gestiunea medicamentelor")










Editarea unui medicament
------------------------
In imaginea urmatoare este prezentata editarea medicamentelor:

![Login](doc/images/medicamente_editare.png "Editarea medicamentelor")











Pacientii sunt in primul rand inregistrati ca User(cu nume, email, parola si rol), apoi in tabelul propriu au campuri separate care ii identifica(Pacienti: CNP, Varsta, Tip  asigurare )
![Login](doc/images/pacienti_adaugare.png "Adaugarea unui pacient")


Gestiunea pacientilor
------------------------
In imaginea urmatoare este prezentata lista pacientilor:

![Login](doc/images/pacienti_gestiune.png "Gestiunea pacientilor")


















Editarea unui pacient
------------------------
In imaginea urmatoare este prezentata editarea pacientilor:

![Login](doc/images/pacienti_editare.png "Editarea pacientilor")











Adminstratorul poate crea, deasemenea diferite rapoarte:



1. Raportul medicamentelor prescrise de fiecare medic
---------------------------------------------------
In imaginea urmatoare este prezentat acest raport, care contine cantitatea din fiecare tip de medicament prescris, precum si valoarea medicamentelor (cantitate * pret unitar).

![Login](doc/images/raport_medicamente_per_doctor.png "Raportul medicamentelor prescrise de fiecare medic")



















2. Raport cu cantitatile totale de medicamente prescrise 
---------------------------------------------------
In imaginea urmatoare este prezentat acest raport, care contine cantitatile totale din fiecare tip de medicament prescrise de toti medicii, in toate clinicile considerate.

![Login](doc/images/raport_total_medicamente_prescrise.png "Raportul cantitatilor totale de medicamente prescrise")

























3. Raport cu numarul de retete emise fiecarui pacient
---------------------------------------------------
In imaginea urmatoare este prezentat acest raport, care contine numarul total de retete prescrise fiecarui pacient de toti medicii, in toate clinicile considerate.

![Login](doc/images/raport_retete_per_pacient.png "Raportul numarului de retete emise fiecarui pacient ")





















Fiecare medic din sistem poate gestiona diagnosticele emise si retetele aferente, avand drepturi doar asupra proprilor retete. 

Un  medic poate profesa in cadrul mai multor clinici.
Fiecare reteta emisa poate contine mai multe coduri de medicamene, in diferite cantitati, ajustabile.


Gestiunea retetelor de catre fiecare medic
---------------------------------------------
In imaginea urmatoare este prezentata pagina retetelor. Se observa ca atunci cand Doctor1 este logat, poate vedea doar retetele emise sub codul propriu. 
Odata emisa o reteta, nimeni nu mai are dreptul de editare sau stergere din sistem, medicul avand doar drept doar de citire. 

![Login](doc/images/gestiune_retete_per_medic.png "Gestiunea retetelor per medic")














Adaugarea unei retete
-----------------------------

La adaugarea unei retete, medicul vede doar pacientii introdusi in sistem in urma unei programari, altfel trebuie sa ii inregistreze si poate selecta clinica la care face consultatia, codul bolii si unul sau mai multe medicamente (pentru fiecare se realizeza un Select).
![Login](doc/images/reteta_adaugare.png "Adaugarea unei retete")
























Retetele unui pacient
----------------------

Fiecare pacient, in urma logarii isi poate vedea retetele care i-au fost emise, dar nu are alt drept asupra lor.
![Login](doc/images/pacienti_retete_proprii.png "Retetele unui pacient")