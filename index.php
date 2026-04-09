<?php
include 'assets/utils/header.php';
?>
<main>
    <!-- 1) section hero donc image sera intégrée quand y aura du css -->
    <section class="hero">
        <div>
            <h1>VetCare</h1>
            <p>Pour leur bien-être, on a le savoir-faire</p>
        </div>
    </section>
    <!-- 2) Présentation institutionnelle du professionnel / de l’organisation -->
    <section class="presentation">
        <div>
            <h2>Notre cabinet en quelques mots...</h2>
            <p>VetCare est un cabinet vétérinaire dédié au bien-être et à la santé de vos animaux de compagnie. Grâce à une équipe attentive et passionnée, il propose une large gamme de soins adaptés, allant de la prévention aux traitements spécialisés. Le cabinet se distingue par la qualité de son accompagnement et son approche personnalisée. Moderne et bien équipé, VetCare met tout en œuvre pour offrir des services fiables et efficaces. Un lieu de confiance où chaque animal est accueilli avec douceur et professionnalisme.</p>
        </div>
    </section>
    <!-- 3) Carroussel en css avec 4 cards pour les services -->
    <h2>Nos services</h2>
    <section id="cards">
        <div class="card">
            <h3>Médecine générale et préventive</h3>
            <p>Le coeur de notre métier : assurer le suivi de santé de votre compagnon tout au long de sa vie.</p>
            <ul>
                <li>Consultation annuelle</li>
                <li>Identification</li>
                <li>Nutrition</li>
            </ul>
            <img src="assets/img/card1.png" alt="Image de medecine generale preventive dans un cabinet veterinaire">
        </div>
        <div class="card">
            <h3>Chirurgie et dentisterie</h3>
            <p>Nous disposons d'un bloc opératoire équipé pour les interventions courantes et spécialisées.</p>
            <ul>
                <li>Chirurgie de convenance</li>
                <li>Soins dentaires</li>
                <li>Chirurgie des tissus mous</li>
            </ul>
            <img src="assets/img/card2.png" alt="Image de chirurgie des tissus mous dans un cabinet veterinaire">
        </div>
        <div class="card">
            <h3>Imagerie et laboratoire</h3>
            <p>Pour un diagnostic rapide et précis directement sur place.</p>
            <ul>
                <li>Radiographie numérique</li>
                <li>Analyse de sang</li>
                <li>Echographie</li>
            </ul>
            <img src="assets/img/card3.png" alt="Image d'echographie dans un cabinet veterinaire">
        </div>
        <div class="card">
            <h3>Spécialiste NAC</h3>
            <p id="padd">Parce qu'un lapin, un reptile ou un oiseau demande une expertise particulière, notre cabinet est formé aux soins spécifiques de ces petits patients fragiles. Nous disposons d'un équipement de pointe adapté à leur petite taille et d'un espace d'hospitalisation calme, conçu pour minimiser le stress de ces espèces souvent craintives. De la médecine préventive à la chirurgie spécialisée, nous veillons à leur santé avec une douceur infinie.</p>
            <img src="assets/img/card4.png" alt="Image de specialiste NAC dans un cabinet veterinaire">
        </div>
    </section>
    <!-- 4) Tableau horaires centré -->
     <section class="tab">
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
     </section>
    <!-- 5) Atouts les uns en dessous des autres avec image d'un côté et txt de l'autre -->
    <h2>Nos atouts et spécificités</h2>
    <section class="bloc" id="block-1">
        <div class="contenuAtouts">
            <img class="section-image" src="assets/img/bloc1.jpg" alt="Image chat" />
            <h3>Approche "Fear-Free"</h3>
            <p>Nous mettons tout en oeuvre pour réduire le stress de votre animal dès son entrée dans le cabinet. Utilisation de phéromones apaisantes, manipulation douce et friandises de récompense font partie de notre protocole.</p>
        </div>
    </section>
    <section class="bloc" id="block-2">
        <div class="contenuAtouts">
            <h3>Plateau technique de pointe</h3>
            <p>En investissant dans les dernières technologies (laser thérapeutique, radiographie haute définition), nous garantissons des soins moins invasifs et une récupération plus rapide pour vos protégés.</p>
            <img class="section-image" src="assets/img/bloc2.jpg" alt="Image chien" />
        </div>
    </section>
    <section class="bloc" id="block-1">
        <div class="contenuAtouts">
            <img class="section-image" src="assets/img/bloc3.jpg" alt="Image chien" />
            <h3>Urgences et continuité des soins</h3>
            <p>Le cabinet collabore avec un service d'astreinte pour garantir une prise en charge 24h/24 et 7j/7. En cas d'imprévu, vous n'êtes jamais seul.</p>
        </div>
    </section>
    <section class="bloc" id="block-2">
        <div class="contenuAtouts">
            <h3>Transparence et pédagogie</h3>
            <p>Chaque acte est expliqué en détail et un devis vous est systématiquement proposé pour les interventions lourdes. Nous croyons qu'un propeiétaire bien informé est le meilleur allié pour la santé de l'animal.</p>
            <img class="section-image" src="assets/img/bloc4.jpg" alt="Image chat" />
        </div>
    </section>

    <!-- 6) Présentation de l'équipe (6 veto) avec img en rond et nom + spécialité en dessous -->
    <h2>Notre équipe</h2>
    <section id="equipes">
        <div class="equipe">
            <img src="assets/img/NAC.png" alt="Veterinaire femme specialiste NAC">
            <p class="docteur">Dr Dubois M.</p>
            <p>NAC</p>
        </div>
        <div class="equipe">
            <img src="assets/img/imagerie.png" alt="Veterinaire homme specialiste imagerie medicale">
            <p class="docteur">Dr Moreau L.</p>
            <p>Imagerie médicale</p>
        </div>
        <div class="equipe">
            <img src="assets/img/generale.png" alt="Veterinaire femme medecine generale">
            <p class="docteur">Dr Delcourt V.</p>
            <p>Médecine générale et prévention</p>
        </div>
        <div class="equipe">
            <img src="assets/img/chirurgie.png" alt="Veterinaire homme specialiste chirurgie des tissus mous">
            <p class="docteur">Dr Martel H.</p>
            <p>Chirurgie des tissus mous</p>
        </div>
        <div class="equipe">
            <img src="assets/img/dermatologie.png" alt="Veterinaire homme specialiste dermatologie animale">
            <p class="docteur">Dr Caron E.</p>
            <p>Dermatologie animale</p>
        </div>
        <div class="equipe">
            <img src="assets/img/nutrition.png" alt="Veterinaire femme specialiste nutrition">
            <p class="docteur">Dr Petit J.</p>
            <p>Nutrition animale</p>
        </div>
    </section>
</main>


<?php
include 'assets/utils/footer.php';
?>