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

/* modules/XC/YandexCheckout/onboarding/body.twig */
class __TwigTemplate_6f2f21fd81033c6e4ee0427931e17bd65f706d01b4e7c87da53ec7ac12c7158a extends \XLite\Core\Templating\Twig\Template
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
        echo "<xlite-wizard-step-payment-yandex-money inline-template>
  <div class=\"online yandex-money\">

    <div class=\"image\">
      <img src=\"";
        // line 8
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["modules/XC/YandexCheckout/onboarding/logo.png"]), "html", null, true);
        echo "\" alt=\"";
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('t')->getCallable(), ["Yandex.Checkout"]), "html", null, true);
        echo "\" title=\"";
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('t')->getCallable(), ["Yandex.Checkout"]), "html", null, true);
        echo "\" />
    </div>

    <div class=\"note\">
      ";
        // line 12
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('t')->getCallable(), ["A simple service providing online payments — for live and business."]), "html", null, true);
        echo "
    </div>

    ";
        // line 15
        if ($this->getAttribute(($context["this"] ?? null), "isMethodConfigured", [], "method")) {
            // line 16
            echo "      <div class=\"switcher";
            if ($this->getAttribute(($context["this"] ?? null), "isMethodEnabled", [], "method")) {
                echo " enabled";
            }
            echo "\">
        <span class=\"inactive\">";
            // line 17
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('t')->getCallable(), ["checkbox.onoff.off"]), "html", null, true);
            echo "</span>
        <a href=\"#\" @click.prevent=\"switchMethod(";
            // line 18
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, $this->getAttribute(($context["this"] ?? null), "getMethodId", [], "method"), "html", null, true);
            echo ", \$event)\">
          <div>
            <span class=\"fa fa-check\"></span>
          </div>
        </a>
        <span class=\"active\">";
            // line 23
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('t')->getCallable(), ["checkbox.onoff.on"]), "html", null, true);
            echo "</span>
      </div>
    ";
        } else {
            // line 26
            echo "      <div class=\"button\">
        ";
            // line 27
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('widget')->getCallable(), [$this->env, $context, [0 => "\\XLite\\View\\Button\\Link", "label" => call_user_func_array($this->env->getFunction('t')->getCallable(), ["Launch Yandex"]), "location" => $this->getAttribute(($context["this"] ?? null), "getMethodSettingsUrl", [], "method"), "blank" => 1]]), "html", null, true);
            echo "
      </div>
    ";
        }
        // line 30
        echo "
    <div class=\"added-mark\">
      <span class=\"fa fa-check\"></span>
    </div>
  </div>
</xlite-wizard-step-payment-yandex-money>";
    }

    public function getTemplateName()
    {
        return "modules/XC/YandexCheckout/onboarding/body.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 30,  83 => 27,  80 => 26,  74 => 23,  66 => 18,  62 => 17,  55 => 16,  53 => 15,  47 => 12,  36 => 8,  30 => 4,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "modules/XC/YandexCheckout/onboarding/body.twig", "/var/www/xcart/skins/admin/modules/XC/YandexCheckout/onboarding/body.twig");
    }
}
