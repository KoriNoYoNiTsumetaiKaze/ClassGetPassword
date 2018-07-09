<?php
/*
 * класс генрации случайного пароля 
 * механизм настраивается через сеттеры для контроля входных данных*/
class GetPasswordClass
{
    private $lenPass = 6;//длина пароля
    private $flagN = true;//флаг использовать цифры
    private $flagBL = true;//флаг использовать буквы верхнего регистра
    private $flagSL = true;//флаг использовать буквы нижнего регистра
    private $flagSS = true;//флаг использовать спецсимволы
    private $dicNum = "1234567890";//словарь цифр
    private $dicBL = "QWERTYUIOPASDFGHJKLZXCVBNM";//словарь буквы верхнего регистра
    private $dicSL = "qwertyuiopasdfghjklzxcvbnm";//словарь буквы нижнего регистра
    private $dicSS = "~`!@#$%^&*()_-+=[]{}\|/,.<>?";//словарь спецсимволы

    public function getPassword() {//метод генерации пароля
		//формируем общий словарь в зависимости от настроек
		$dic = '';
		if ($this->flagN) $dic = $dic.$this->dicNum;
        if ($this->flagBL) $dic = $dic.$this->dicBL;
        if ($this->flagSL) $dic = $dic.$this->dicSL;
        if ($this->flagSS) $dic = $dic.$this->dicSS;
        $dic = $dic.$dic.$dic;//дублируем словарь для нормализации распределения
        //формируем пароль указаной длины дергая случайным образом символы из словаря
        $pass = '';
        $lendic = strlen($dic)-1;
        for ($i=0; $i<$this->lenPass; $i++) {
			$r = mt_rand(0,$lendic);
			$pass = $pass.$dic[$r];
		}
        return $pass;
    }
    public function setPasswordLen($PL) {//установить длину создаваемого пароля
		try {
			$N_PL = (int)$PL;//приводим параметр к целому числу, если данные не корректны и вываливается ошибка оставляем прежнее значение
			if ($N_PL<=0) return 'Error';//длина не можети быть отрицательной информируем об ошибке и не меняем значение
			if ($N_PL>1000) return 'Error';//ограничиваем верхний предел длинны пароля чтобы метод не работал слишком долго
			$this->lenPass = $N_PL;
		} catch (Exception $e) {
			return 'Error';
		}		
	}
    public function getPasswordLen() {//получить текущее значение длины пароля
		return $this->LenPass;
	}
    public function setFlagNumber($FN) {//установить флаг использования цифр в пароле
		try {
			$B_FN = (bool)$FN;//если входной параметр не булево и не может быть к нему приведен выводится ошибка и данные не меняются
			$this->flagN = $B_FN;
		} catch (Exception $e) {
			return 'Error';
		}		
	}
    public function getFlagNumber() {
		return $this->flagN;
	}
    public function setFlagBigLetter($FBL) {
		try {
			$B_FBL = (bool)$FBL;
			$this->flagBL = $B_FBL;
		} catch (Exception $e) {
			return 'Error';
		}		
	}
    public function getFlagBigLetter() {
		return $this->flagBL;
	}
    public function setFlagSmallLetter($FSL) {
		try {
			$B_FSL = (bool)$FSL;
			$this->flagSL = $B_FSL;
		} catch (Exception $e) {
			return 'Error';
		}		
	}
    public function getFlagSmallLetter() {
		return $this->flagSL;
	}
    public function setFlagSpecialSymbol($FSS) {
		try {
			$B_FSS = (bool)$FSS;
			$this->flagSS = $B_FSS;
		} catch (Exception $e) {
			return 'Error';
		}		
	}
    public function getFlagSpecialSymbol() {
		return $this->flagSS;
	}	
}
?>
