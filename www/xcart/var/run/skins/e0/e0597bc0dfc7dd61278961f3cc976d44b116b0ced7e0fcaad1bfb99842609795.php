<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* trial_notice_v2/activate_key.twig */
class __TwigTemplate_75cb0ddd2f4ca7e62cf17a6660e5a5d8b41246b944e665c0e9fe2f9c0b1a3588 extends \XLite\Core\Templating\Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 4
        echo "<div class=\"activate-key-form\">
  ";
        // line 5
        $this->startForm("XLite\\View\\Form\\Module\\ActivateKey", ["formAction" => "register_key"]);        // line 6
        echo "    <div class=\"addon-key\"><input type=\"text\" name=\"key\" value=\"\" placeholder=\"";
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('t')->getCallable(), ["Enter your premium license key"]), "html", null, true);
        echo "\" class=\"form-control\"/></div>
    ";
        // line 7
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('widget')->getCallable(), [$this->env, $context, [0 => "XLite\\View\\Button\\Submit", 1 => ["button-size" => "btn-default", "label" => call_user_func_array($this->env->getFunction('t')->getCallable(), ["Register"]), "attributes" => ["data-segment-click" => "Register"]]]]), "html", null, true);
        echo "

    ";
        // line 9
        if ($this->getAttribute(($context["this"] ?? null), "isTrialPeriodExpired", [], "method")) {
            // line 10
            echo "    <div class=\"text or\">";
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('t')->getCallable(), ["or"]), "html", null, true);
            echo "</div>
    ";
            // line 11
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('widget')->getCallable(), [$this->env, $context, [0 => "XLite\\View\\Button\\Regular", "label" => "Purchase a premium license key", "style" => "purchase-license regular-main-button", "jsCode" => (("window.open('" . $this->getAttribute(($context["this"] ?? null), "getPurchaseURL", [], "method")) . "', '_blank');"), "attributes" => ["data-segment-click" => "Purchase a premium license key"]]]), "html", null, true);
            echo "
    ";
        }
        // line 13
        echo "  ";
        $this->endForm();        // line 14
        echo "
  <div class=\"additional-link\" data-segment-click=\"Activate free license\" data-segment-click-handler=\"a\">";
        // line 15
        echo call_user_func_array($this->env->getFunction('t')->getCallable(), ["Activate free license & remove premium features.", ["url" => $this->getAttribute(($context["this"] ?? null), "getActivateFreeLicenseURL", [], "method")]]);
        echo "</div>
  <div class=\"additional-link\" data-segment-click=\"Contact us\" data-segment-click-handler=\"a\">";
        // line 16
        echo call_user_func_array($this->env->getFunction('t')->getCallable(), ["Contact us if you have any questions.", ["url" => $this->getAttribute(($context["this"] ?? null), "getContactUsURL", [], "method")]]);
        echo "</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "trial_notice_v2/activate_key.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 16,  61 => 15,  58 => 14,  56 => 13,  51 => 11,  46 => 10,  44 => 9,  39 => 7,  34 => 6,  33 => 5,  30 => 4,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "trial_notice_v2/activate_key.twig", "/var/www/xcart/skins/admin/trial_notice_v2/activate_key.twig");
    }
}
