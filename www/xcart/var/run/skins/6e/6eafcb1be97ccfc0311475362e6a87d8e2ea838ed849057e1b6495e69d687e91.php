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

/* db/backup.twig */
class __TwigTemplate_ffa0073fd5deb2dfb9a2eb0d5b4f9cb99cd8dce25be40d8147da4b886467ddbf extends \XLite\Core\Templating\Twig\Template
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
<p class=\"spaced\">
  ";
        // line 6
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('t')->getCallable(), ["Use this section to back up the database of your online store. Please note that the database backup procedure can take up to several minutes."]), "html", null, true);
        echo "
  <br/>
  ";
        // line 8
        echo call_user_func_array($this->env->getFunction('t')->getCallable(), ["You can choose if to download your database data"]);
        echo "
</p>

<div class=\"db-backup-form\">
  ";
        // line 12
        $this->startForm("\\XLite\\View\\Form\\DbBackup");        // line 13
        echo "    ";
        if ( !$this->getAttribute(($context["this"] ?? null), "isFileWritable", [], "method")) {
            // line 14
            echo "      <div class=\"backup-warning-content alert alert-warning\">
        ";
            // line 15
            echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('t')->getCallable(), ["You cannot save database data to a file on the web server ('var/backup/sqldump.sql.php')."]), "html", null, true);
            echo "
        ";
            // line 16
            if ( !$this->getAttribute(($context["this"] ?? null), "isDirExists", [], "method")) {
                // line 17
                echo "          <span class=\"no-backup-dir\">";
                echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('t')->getCallable(), ["The directory 'var/backup/' does not exist or is not writable."]), "html", null, true);
                echo "</span>
        ";
            }
            // line 19
            echo "        ";
            if ($this->getAttribute(($context["this"] ?? null), "isDirExists", [], "method")) {
                // line 20
                echo "          <span class=\"backup-file-non-writable\">";
                echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('t')->getCallable(), ["The directory 'var/backup/' does not exist or is not writable."]), "html", null, true);
                echo "</span>
        ";
            }
            // line 22
            echo "      </div>
    ";
        }
        // line 24
        echo "
    ";
        // line 25
        echo XLite\Core\Templating\Twig\Extension\xcart_twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('widget')->getCallable(), [$this->env, $context, [0 => "\\XLite\\View\\StickyPanel\\Backup", "isFileWritable" => $this->getAttribute(($context["this"] ?? null), "isFileWritable", [], "method"), "isFileExists" => $this->getAttribute(($context["this"] ?? null), "isFileExists", [], "method")]]), "html", null, true);
        echo "
  ";
        $this->endForm();        // line 27
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "db/backup.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 27,  81 => 25,  78 => 24,  74 => 22,  68 => 20,  65 => 19,  59 => 17,  57 => 16,  53 => 15,  50 => 14,  47 => 13,  46 => 12,  39 => 8,  34 => 6,  30 => 4,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "db/backup.twig", "/var/www/xcart/skins/admin/db/backup.twig");
    }
}
