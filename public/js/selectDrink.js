let iB = -1;

function indexSucre(niveaux) {
	if (niveaux == 'plus' && iSucre < 5) {
		iSucre++;
	} else if (niveaux == 'moins' && iSucre > 0) {
		iSucre--;
	}
	$('#sucresNb').prop('value', iSucre);
	$('#ledSucres img').attr('src', "assets/led"+(iSucre)+"sucres.png");
}

function indexBoissons(niveaux) {
	if (niveaux == 'plus') {
		iB++;
	} else if (niveaux == 'moins') {
		iB--;
	}
	if (iB <= 0) {
		iB = 12;
	}
	affichageChoix();
}

function affichageChoix() {
	choix = boissons[iB%boissons.length];
	$('#nomBoisson').prop('value', choix.nom);
	$('.boissons').html(choix.nom +'<br />' + choix.prix/100 + '0€');
	return choix;
}

function validerChoix() {
	if (!(iB == -1)) {
		monnayeur(choix.prix);
	}
}
function marginAnimate(ingHeight) {
	let margin = Number($('#Lait').css('margin-top').split('px')[0]);
	let newMargin = margin - ingHeight;
	 $('#Lait').animate({marginTop: newMargin+'px'},1000);
}

function remplissageGob() {
	let strateIng = [
		(choix.ingredients[2]*30), // Lait
		(choix.ingredients[4]*30), // Eau
		(choix.ingredients[3]*30), // The
		(choix.ingredients[1]*30), // Choco
		(choix.ingredients[0]*30), // Café
		(iSucre*5),				   // Sucre
	];
	let color;
	switch (choix.nom) {
		case 'café': 
			color = "#462E01";
			break;
		case 'chocolat':
			color = '#955628';
			stratEau = '0px';
			break;
		case 'capuccino':
			color = '#856D4D';
			break;
		case 'the':
			color = '#D1F0C0';
			break;
		default:
			color = '#462E01';
	}
	let i = strateIng.length-1;
	chargement(strateIng);
	animateStrate();
	function animateStrate() {
		if (i > 0) {
			if (strateIng[i] > 0) {
				marginAnimate(strateIng[i]);
				$('.ingredients:eq('+i+')').animate({height: strateIng[i]+'px'},1000, function() {animateStrate();});
				i--;
			} else {
				i--;
				animateStrate();
			}
		} else if (i == 0) {
			if (strateIng[0] > 0) {
				let marginLait = Number($('#Lait').css('margin-top').split('px')[0]);
				$('.ingredients:eq(0)').animate({marginTop: (marginLait-strateIng[0])+'px',	height: strateIng[0]+'px'},1000, function() {
					$('.ingredients:not(#Lait)').animate({backgroundColor: color, opacity : 0.7},1000);});
			} else {
				$('.ingredients:not(#Lait)').animate({backgroundColor: color, opacity : 0.7},1000);
			}
		}
	}
}

function chargement(listIng) {
	let timing = 1000;
	for (let i = 0; i < listIng.length; i++) {
		if (listIng[i] > 0) {
			timing += 1000;
		}
	}
	$('#chargement').animate({width: '768px'}, timing, function() {
		$('.boissons').html('Servez vous !');
	});
}

function affichageGob() {
	$('#gobelet').fadeIn('slow');
	// $('#gobelet').fadeIn('slow', remplissageGob());
	// comptageStock(choix.ingredients);
}

function comptageStock(tabIng) {
	for (let i = 0; i < tableauIng.length; i++) {
		tableauIng[i] -= tabIng[i];
	}
	affichageJauges();
}

function affichageJauges() {
	let hauteurJauge = (Math.round(($('#ingredientsCounter').height()-59)*10))/10;
	for (let i = 0; i < tableauIng.length; i++) {
		let hauteurIng = Math.round((hauteurJauge/100)*tableauIng[i]);
		let margin = hauteurJauge - hauteurIng;
		$('.compteurIngredients:eq('+i+')').height(hauteurIng + 'px');
		$('.compteurIngredients:eq('+i+')').css('margin-top', margin+'px');
	}
}