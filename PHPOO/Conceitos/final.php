<?php
class ClasseBase {
   public function teste() {
       echo "ClasseBase::teste() chamado\n";
   }

	// palavra-chave 'final', previne que classes filhas sobrecarreguem um método ou variável   
   final public function maisTeste() {
       echo "ClasseBase::maisTeste() chamado\n";
   }
}

class ClasseFilha extends ClasseBase {
   public function maisTeste() {
       echo "ClasseFilha::maisTeste() called\n";
   }
}
// Resulta em erro Fatal: Não pode sobrescrever método final ClasseBase::maisTeste()
?>

