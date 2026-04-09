<?php
include 'assets/utils/header.php';
?>
<main>
    <!-- 1) section hero donc image sera intégrée quand y aura du css -->
    <section>
        <h1>VetCare</h1>
        <p>Pour leur bien-être, on a le savoir-faire</p>
    </section>
    <!-- 2) carroussel en css avec 4 cards pour les services -->
    <section>
        <h2>Nos services</h2>
        <div>
            <h3>Médecine générale et préventive</h3>
            <p>Le coeur de notre métier : assurer le suivi de santé de votre compagnon tout au long de sa vie.</p>
            <ul>
                <li>Consultation annuelle</li>
                <li>Identification</li>
                <li>Nutrition</li>
            </ul>
            <img src="assets/img/img_icn.jpg" alt="">
        </div>
        <div>
            <h3>Chirurgie et dentisterie</h3>
            <p>Nous disposons d'un bloc opératoire équipé pour les interventions courantes et spécialisées.</p>
            <ul>
                <li>Chirurgie de convenance</li>
                <li>Soins dentaires</li>
                <li>Chirurgie des tissus mous</li>
            </ul>
            <img src="assets/img/img_icn.jpg" alt="">
        </div>
        <div>
            <h3>Imagerie et laboratoire</h3>
            <p>Pour un diagnostic rapide et précis directement sur place.</p>
            <ul>
                <li>Radiographie numérique</li>
                <li>Analyse de sang</li>
                <li>Echographie</li>
            </ul>
            <img src="assets/img/img_icn.jpg" alt="">
        </div>
        <div>
            <h3>Spécialiste NAC</h3>
            <p>Parce qu'un lapin, un reptile ou un oiseau demande une expertise particulière, notre cabinet est formé aux soins spécifiques de ces petits patients fragiles.</p>
            <img src="assets/img/img_icn.jpg" alt="">
        </div>
    </section>
    <!-- 3) Tableau horaires centré -->
    <h2>Nos horaires de visite</h2>
    <table>
        <tr>
            <td>Lundi</td>
            <td>8h-19h</td>
        </tr>
        <tr>
            <td>Mardi</td>
            <td>8h-19h</td>
        </tr>
        <tr>
            <td>Mercredi</td>
            <td>8h-19h</td>
        </tr>
        <tr>
            <td>Jeudi</td>
            <td>8h-19h</td>
        </tr>
        <tr>
            <td>Vendredi</td>
            <td>8h-19h</td>
        </tr>
        <tr>
            <td>Samedi</td>
            <td>8h-19h</td>
        </tr>
        <tr>
            <td>Dimanche</td>
            <td>Fermé</td>
        </tr>
    </table>
    <!-- 4) Atouts les uns en dessous des autres avec image d'un côté et txt de l'autre -->
    <h2>Nos atouts et spécificités</h2>
    <section>
        <div>
            <img src="assets/img/img_icn.jpg" alt="" />
            <h3>Approche "Fear-Free"</h3>
            <p>Nous mettons tout en oeuvre pour réduire le stress de votre animal dès son entrée dans le cabinet. Utilisation de phéromones apaisantes, manipulation douce et friandises de récompense font partie de notre protocole.</p>
        </div>
    </section>
    <section>
        <div>
            <img src="assets/img/img_icn.jpg" alt="" />
            <h3>Plateau technique de pointe</h3>
            <p>En investissant dans les dernières technologies (laser thérapeutique, radiographie haute définition), nous garantissons des soins moins invasifs et une récupération plus rapide pour vos protégés.</p>
        </div>
    </section>
    <section>
        <div>
            <img src="assets/img/img_icn.jpg" alt="" />
            <h3>Urgences et continuité des soins</h3>
            <p>Le cabinet collabore avec un service d'astreinte pour garantir une prise en charge 24h/24 et 7j/7. En cas d'imprévu, vous n'êtes jamais seul.</p>
        </div>
    </section>
    <section>
        <div>
            <img src="assets/img/img_icn.jpg" alt="" />
            <h3>Transparence et pédagogie</h3>
            <p>Chaque acte est expliqué en détail et un devis vous est systématiquement proposé pour les interventions lourdes. Nous croyons qu'un propeiétaire bien informé est le meilleur allié pour la santé de l'animal.</p>
        </div>
    </section>

    <!-- 5) Présentation de l'équipe (6 veto) avec img en rond et nom + spécialité en dessous -->
    <section>
        <h2>Notre équipe</h2>
        <div>
            <img src="assets/img/img_icn.jpg" alt="">
            <p>Dr Dubois M.</p>
            <p>NAC</p>
        </div>
        <div>
            <img src="assets/img/img_icn.jpg" alt="">
            <p>Dr Moreau L.</p>
            <p>Imagerie médicale</p>
        </div>
        <div>
            <img src="assets/img/img_icn.jpg" alt="">
            <p>Dr Delcourt V.</p>
            <p>Médecine générale et prévention</p>
        </div>
        <div>
            <img src="assets/img/img_icn.jpg" alt="">
            <p>Dr Martel H.</p>
            <p>Chirurgie des tissus mous</p>
        </div>
        <div>
            <img src="assets/img/img_icn.jpg" alt="">
            <p>Dr Caron E.</p>
            <p>Dermatologie animale</p>
        </div>
        <div>
            <img src="assets/img/img_icn.jpg" alt="">
            <p>Dr Petit J.</p>
            <p>Nutrition animale</p>
        </div>
    </section>
</main>


<?php
include 'assets/utils/footer.php';
?>