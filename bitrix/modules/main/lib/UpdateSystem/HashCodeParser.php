<? namespace Bitrix\Main\UpdateSystem;$GLOBALS['____638356529']= array(base64_decode('YmFzZTY0X2RlY29'.'k'.'ZQ=='),base64_decode('dW5zZXJ'.'pYWxpem'.'U='),base64_decode('b3B'.'lbnNz'.'bF92'.'ZX'.'Jp'.'Znk='),base64_decode('dW5zZ'.'X'.'JpYWx'.'pemU='));if(!function_exists(__NAMESPACE__.'\\___1052913810')){function ___1052913810($_706035554){static $_1986077886= false; if($_1986077886 == false) $_1986077886=array('YWxs'.'b3d'.'lZF9'.'jbG'.'Fzc2Vz','aW'.'5mb'.'w==','c2lnbmF0dXJl','c'.'2'.'hhMjU2V2l0aFJTQ'.'UV'.'uY3J5cHRpb'.'24=','a'.'W5mbw==','Y'.'W'.'x'.'s'.'b3'.'d'.'l'.'ZF9jb'.'GFzc2Vz','RX'.'Jyb3IgdmVyaWZ5IG9wZW5zc2w'.'gW'.'0hDU'.'FA'.'wMV0'.'=',''.'LS0tLS'.'1CRUd'.'JTi'.'BQVU'.'JMSUMg'.'S0'.'VZLS0tLS'.'0K'.'TUlJQkl'.'q'.'QU5C'.'Z'.'2t'.'xa'.'GtpRzl3ME'.'JBUU'.'V'.'GQUF'.'PQ'.'0FR'.'O'.'EFNSUlCQ2'.'dL'.'Q0'.'F'.'RRU'.'E2a'.'G'.'N4SXF'.'paXR'.'VW'.'lJNd1lp'.'d'.'WtTVQpoO'.'Xhh'.'NWZFRFlsY2'.'NiVz'.'N2'.'ajhBdmE'.'zN'.'XZLcV'.'Z'.'ONGl'.'CO'.'XR'.'xQ1g3'.'a'.'l'.'U4N'.'nF'.'BY'.'TJ2'.'MzdtYlRGNnBjWTZ'.'IR1BBaF'.'JGCmJ'.'wbn'.'dYT'.'1k3'.'WUd'.'4Qj'.'FuU'.'0'.'tadkUr'.'a'.'kFSY'.'m'.'lMTEJn'.'WjFjRzZa'.'M'.'G'.'R1dTVp'.'MVhocEl'.'STDFjTjBIa'.'DV'.'m'.'Z'.'XpwalhDNk8KWXhZcTBuV'.'G9IVGp'.'5UmIxeWN6'.'d3RtaV'.'J3WX'.'F1ZFhn'.'L3hXeHBwcXdGMHRVbG'.'QzUUJyM'.'2k2OE'.'I4a'.'n'.'F'.'N'.'bStUa'.'mRlQQp1L2ZnMU'.'ow'.'Skd'.'0U'.'jQveks0Rzd'.'Z'.'Sk52'.'aG1'.'1aH'.'JS'.'R'.'2t'.'5QVFWM'.'FRW'.'dTV'.'MRXVnU3h'.'q'.'QXBSb'.'UlKUU5IUU1LME'.'VoOT'.'N3'.'Ck'.'1ab0Zv'.'UHA5U'.'2dKN0dhRlU4a3p'.'TK0VR'.'Y250W'.'Xhi'.'MU5I'.'V'.'UpV'.'SX'.'ZUZGl1UlVlRktseVRk'.'eElySD'.'ZDTC8vYXB'.'NSDM'.'KRndJR'.'EFRQUIK'.'LS0tLS1FT'.'kQgUFVCTE'.'lDIEtFWS'.'0tLS'.'0t');return base64_decode($_1986077886[$_706035554]);}}; use Bitrix\Main\Application; use Bitrix\Main\Security\Cipher; use Bitrix\Main\Security\SecurityException; class HashCodeParser{ private string $_494888674; public function __construct(string $_494888674){ $this->_494888674= $_494888674;}  public function parse(){ $_500481627= $GLOBALS['____638356529'][0]($this->_494888674); $_500481627= $GLOBALS['____638356529'][1]($_500481627,[___1052913810(0) => false]); if($GLOBALS['____638356529'][2]($_500481627[___1052913810(1)], $_500481627[___1052913810(2)], $this->__946970527(), ___1052913810(3)) == round(0+0.2+0.2+0.2+0.2+0.2)){ $_1928581397= Application::getInstance()->getLicense()->getHashLicenseKey(); $_1138219374= new Cipher(); $_766663164= $_1138219374->decrypt($_500481627[___1052913810(4)], $_1928581397); return $GLOBALS['____638356529'][3]($_766663164,[___1052913810(5) => false]);} throw new SecurityException(___1052913810(6));} private function __946970527(): string{ return ___1052913810(7);}}?>