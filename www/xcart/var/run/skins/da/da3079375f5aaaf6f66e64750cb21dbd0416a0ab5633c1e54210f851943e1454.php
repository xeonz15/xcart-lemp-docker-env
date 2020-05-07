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

/* trial_notice_v2/body.twig */
class __TwigTemplate_ad1832a4187fd26cdce6fd2a5137feeb6b8afdf725e480b2962028a7afcf1295 extends \XLite\Core\Templating\Twig\Template
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
        echo "
<div class=\"trial-notice-block";
        // line 5
        if ( !$this->getAttribute(($context["this"] ?? null), "isPopup", [], "method")) {
            echo " alert alert-warning";
        }
        echo "\">
  ";
        // line 6
        if (( !$this->getAttribute(($context["this"] ?? null), "isPopup", [], "method") && $this->getAttribute(($context["this"] ?? null), "isTrialPeriodExpired", [], "method"))) {
            // line 7
            echo "    <h2 class=\"title\">";
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('t')->getCallable(), ["Your X-Cart Business trial has expired!"]), "html", null, true);
            echo "</h2>
  ";
        }
        // line 9
        echo "
  <div class=\"notice\">";
        // line 10
        echo call_user_func_array($this->env->getFunction('t')->getCallable(), ["You must register your X-Cart installation before using it for real sales. Activate your existing license key or purchase a premium license to skyrocket your business."]);
        echo "</div>

  ";
        // line 12
        if ($this->getAttribute(($context["this"] ?? null), "isTrialPeriodExpired", [], "method")) {
            // line 13
            echo "    ";
            $fullPath = \XLite\Core\Layout::getInstance()->getResourceFullPath("trial_notice_v2/activate_key.twig");            list($templateWrapperText, $templateWrapperStart) = $this->getThis()->startMarker($fullPath);
            if ($templateWrapperText) {
echo $templateWrapperStart;
}

            $this->loadTemplate("trial_notice_v2/activate_key.twig", "trial_notice_v2/body.twig", 13)->display($context);
            if ($templateWrapperText) {
                echo $this->getThis()->endMarker($fullPath, $templateWrapperText);
            }
            // line 14
            echo "
    ";
            // line 15
            if ( !$this->getAttribute(($context["this"] ?? null), "isPopup", [], "method")) {
                // line 16
                echo "      <hr/>
      <div class=\"important\">";
                // line 17
                echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('t')->getCallable(), ["This message can be removed only through activation of a free or premium license."]), "html", null, true);
                echo "</div>
      <div class=\"faq\">";
                // line 18
                echo call_user_func_array($this->env->getFunction('t')->getCallable(), ["Refer to X-Cart license agreement for further details.", ["licenseAgreementURL" => $this->getAttribute(($context["this"] ?? null), "getLicenseAgreementURL", [], "method")]]);
                echo "</div>
    ";
            }
            // line 20
            echo "  ";
        } else {
            // line 21
            echo "  <div class=\"trial-in-progress\">
    ";
            // line 22
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('widget')->getCallable(), [$this->env, $context, [0 => "XLite\\View\\Button\\Regular", "label" => "Remind me on next sign-in", "style" => "remind-on-next-sign-in", "jsCode" => "popup.close();", "attributes" => ["data-segment-click" => "Remind me on next sign-in"]]]), "html", null, true);
            echo "
    ";
            // line 23
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('widget')->getCallable(), [$this->env, $context, [0 => "XLite\\View\\Button\\Regular", "label" => "Purchase a premium license key", "style" => "purchase-license regular-main-button", "jsCode" => (("window.open('" . $this->getAttribute(($context["this"] ?? null), "getPurchaseURL", [], "method")) . "', '_blank');"), "attributes" => ["data-segment-click" => "Purchase a premium license key"]]]), "html", null, true);
            echo "
  </div>

  <div class=\"register-license-key\">
    <a href=\"#\" class=\"open-license-key-form\">";
            // line 27
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('t')->getCallable(), ["I have a license key"]), "html", null, true);
            echo "</a>
    ";
            $fullPath = \XLite\Core\Layout::getInstance()->getResourceFullPath("trial_notice_v2/activate_key.twig");            list($templateWrapperText, $templateWrapperStart) = $this->getThis()->startMarker($fullPath);
            if ($templateWrapperText) {
echo $templateWrapperStart;
}

            // line 28
            $this->loadTemplate("trial_notice_v2/activate_key.twig", "trial_notice_v2/body.twig", 28)->display($context);
            if ($templateWrapperText) {
                echo $this->getThis()->endMarker($fullPath, $templateWrapperText);
            }
            // line 29
            echo "  </div>
  ";
        }
        // line 31
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "trial_notice_v2/body.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 31,  116 => 29,  111 => 28,  102 => 27,  95 => 23,  91 => 22,  88 => 21,  85 => 20,  80 => 18,  76 => 17,  73 => 16,  71 => 15,  68 => 14,  57 => 13,  55 => 12,  50 => 10,  47 => 9,  41 => 7,  39 => 6,  33 => 5,  30 => 4,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "trial_notice_v2/body.twig", "/var/www/xcart/skins/admin/trial_notice_v2/body.twig");
    }
}
