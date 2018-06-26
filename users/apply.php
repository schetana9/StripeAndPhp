<body class="splash-index">
<script src="https://js.stripe.com/v3/"></script>
  <?php include("../header.php");
  
  ?>
  <section class="teaser bg-top">
    <div class="min-space">
    </div>
    <div class="min-space">
    </div>
    <div class="min-space">
    </div>
    <h1 class="sub-title">Devenir prestataire
    </h1>
    <div class="min-space">
    </div>
    <div class="min-space">
    </div>
  </section>
  <div class="container">
    <?php
if(isset($_REQUEST['msg']))
{
$msg=$_REQUEST['msg'];
if($msg=="Inserted")
{
echo '<div class="succ-msg">Votre application a été bien envoyé et nous vous contacterons dans les plus brefs délais..</div>';
}
else if($msg=="Error")
{
echo '<div class="err-msg">Server Error</div>';		
}
}
else
$msg="";
?>
    <!--<div class="err-msg" id="err_id"><?php echo $msg;?></div>-->
  </div>
  <section class="teaser" style="margin-top:30px;">
    <form id="my-form" class="form-large" action="javascript:cleaner('add')" accept-charset="UTF-8" method="post">
    <input type="hidden"  name="token" id="token">
      <div class="container apply_form">
        <div class="min-space">
        </div>
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
              <span class="title">Votre Email
              </span>
              <input type="email" value="" required="required" class="user-login__input user-login__input" id="email" >
			  <div id="email_err" class="err"></div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <span class="title">Confirmez votre Email
              </span>
              <input type="email" value="" required="required" class="user-login__input user-login__input" id="cemail" >
			  <div id="cemail_err" class="err"></div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <span class="title">Prénom
              </span>
              <input type="text" value="" required="required" class="user-login__input user-login__input" id="fname" >
			  	<div id="name_err" class="err"></div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <span class="title">Nom de famille
              </span>
              <input type="text" value="" required="required" class="user-login__input user-login__input" id="lname" >
			  <div id="lname_err" class="err"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
              <span class="title">Numéro de portable
              </span>
              <input type="text" value=""  required="required" class="user-login__input user-login__input" id="mob_no" >
			  <div id="pho_no_err" class="err"></div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <span class="title">Code postal
              </span>
              <input type="text" value="" required="required" class="user-login__input user-login__input" id="post_code" >
			  <div id="post_code_err" class="err"></div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <span class="title">Experience
              </span>
              <select id="exp" class="user-login__input user-login__input" required="required"> 
                <option value="">Aucune
                </option>
                 <option value="1">1-5 mois
                </option>
                <option value="2">6-12 mois
                </option>
                <option value="3">1-3 années
                </option>
                <option value="4">Je dirige une structure à la personne
                </option>
              </select>
			  <div id="exp_err" class="err"></div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <span class="title">Votre statut actuel ?
              </span>
              <select id="exp" class="user-login__input user-login__input" required="required"> 
                
                 <option value="1"> Auto entrepreneur
                </option>
                <option value="2"> Indépendant
                </option>
                <option value="3">Entreprise
                </option>
                <option value="4">Association
                </option>
              </select>
			  <div id="exp_err" class="err"></div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <span class="title">Faites vous une activité dans ce domaine payée?
              </span>
              <select id="paid_work" class="user-login__input user-login__input" required="required"> 
                <option value="">Aucune
                </option>	
                <option value="1">Non,pas en ce moment
                </option>
                <option value="2">1-10 heures/semaine
                </option>
                <option value="3">10-20 heures/semaine
                </option>
                <option value="4">+20 heures/semaine
                </option>
              </select>
			  <div id="paid_work_err" class="err"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
              <span class="title">Sexe
              </span>
              <select id="gender" class="user-login__input user-login__input" required="required" > 
                	
                <option value="1">masculin
                </option>
                <option value="2">feminin
                </option>
              </select>
			  <div id="select_err" class="err"></div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <span class="title">Date de naissance
              </span>
              <input type="text" id="datepicker" name="datepicker" required="required" placeholder="Select date" class="user-login__input user-login__input">
			  <div id="date_err" class="err"></div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <span class="title">Nationalité
              </span>
              <input type="text" id="nation" name="nation" required="required" class="user-login__input user-login__input">
			  <div id="nation_err" class="err"></div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <span class="title">Pays de naissance
              </span>
              <input type="text" id="suburb" name="datepicker" required="required" placeholder="" class="user-login__input user-login__input">
			  	<div id="suburb_err" class="err"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
              <span class="title">Adresse
              </span>
              <textarea id="address" required="required" class="user-login__input user-login__input req">
              </textarea>
			  <div id="address_err" class="err"></div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <span class="title">Où avez vous entendu parler de nous?
              </span>
              <select id="abt" class="user-login__input user-login__input" required="required" > 
                <option value="">Jamais
                </option>	
                <option value="1">Sur les réseaux sociaux
                </option>
                <option value="2">Publicité
                </option>
                <option value="3">Par un ami
                </option>
              </select>
			  <div id="abt_err" class="err"></div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <input type="submit" class="user-login__action" value="Terminer">
        </div>
      </div>
    </form>
    <div class="min-space">
    </div>
  </section>
  <?php include("../footer.php") ?>
  <script src="../js/jquery-1.9.1.js">
  </script>
  <script src="../js/jquery-ui.js">
  </script>
  <link rel="stylesheet" href="../css/jquery-ui.css">
  <script>
    $(function(){
      $( "#datepicker" ).datepicker({
        dateFormat: 'dd-mm-yy'}
                                   );
    }
     );
  </script>


<script>
// Assumes you've already included Stripe.js!
const stripe = Stripe('pk_test_EH2XE0WQcaE485Ag8jlhIe4B');
const myForm = document.getElementById('my-form');
myForm.addEventListener('submit', handleForm);

async function handleForm(event) {
  event.preventDefault();

  const result = await stripe.createToken('account', {
    legal_entity: {
      first_name: document.getElementById('fname').value,
      last_name: document.getElementById('lname').value,
      
    },
    tos_shown_and_accepted: true,
  });

  if (result.token) {
    document.querySelector('#token').value = result.token.id;
    //myForm.submit();
    document.getElementById('my-form').submit();
  }
}

</script>


</body>
</html>
