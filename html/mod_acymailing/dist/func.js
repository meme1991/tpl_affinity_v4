/**
 * @Author: SPEDI srl
 * @Date:   12-03-2018
 * @Email:  sviluppo@spedi.it
 * @Last modified by:   SPEDI srl
 * @Last modified time: 12-03-2018
 * @License: GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 * @Copyright: Copyright (C) SPEDI srl
 */

function scriviCookie(nomeCookie,valoreCookie,durataCookie)
{
 var scadenza = new Date();
 var adesso = new Date();
 scadenza.setTime(adesso.getTime() + (parseInt(durataCookie) * 60000));
 document.cookie = nomeCookie + '=' + escape(valoreCookie) + '; expires=' + scadenza.toGMTString() + '; path=/';
}

function leggiCookie(nomeCookie)
{
  if (document.cookie.length > 0)
  {
    var inizio = document.cookie.indexOf(nomeCookie + "=");
    if (inizio != -1)
    {
      inizio = inizio + nomeCookie.length + 1;
      var fine = document.cookie.indexOf(";",inizio);
      if (fine == -1) fine = document.cookie.length;
      return unescape(document.cookie.substring(inizio,fine));
    }else{
       return "";
    }
  }
  return "";
}

function cencellaCookie(nomeCookie)
{
  scriviCookie(nomeCookie,'',-1);
}
