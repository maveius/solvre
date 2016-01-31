<?php


namespace Solvre\Views\Base;


use Illuminate\Http\Request;
use liphte\tags\html\Tag;

abstract class LayoutBase
{
    protected $t;
    private $content;
    private $headerJs;
    private $bodyAttributes;
    private $footerJs;

    function __construct()
    {
        $this->t = new Tag();
        $this->content = null;
        $this->headerJs = array();
        $this->bodyAttributes = array();
        $this->footerJs = array();
    }

    abstract public function render(Request $request);

    public function setContent($content)
    {

        $this->content = $content;
    }

    public function addJs($scriptPath)
    {

        array_push($this->headerJs, $scriptPath);
    }

    public function addAllJs($scriptPaths)
    {

        $this->headerJs = array_merge($this->headerJs, $scriptPaths);
    }

    public function addFooterJs($scriptPath)
    {

        array_push($this->footerJs, $scriptPath);
    }

    public function addAllFooterJs($scriptPaths)
    {

        $this->footerJs = array_merge($this->footerJs, $scriptPaths);
    }

    public function addBodyAttribute($bodyAttribute)
    {

        array_push($this->bodyAttributes, $bodyAttribute);
    }

    public function addAllBodyAttributes($allBodyAttributes)
    {

        $this->bodyAttributes = array_merge($this->bodyAttributes, $allBodyAttributes);
    }


    public function getHeaderJs()
    {

        $scripts = array();

        foreach( $this->headerJs as $path ) {
            array_push( $scripts, $this->t->script(['src'=>asset('js/' . $path)]) );
        }

        return implode("", $scripts);
    }

    public function getFooterJs()
    {

        $scripts = array();

        foreach( $this->footerJs as $path ) {
            array_push( $scripts, $this->t->script(['src'=>asset( $path . '.js' )]) );
        }

        return implode("", $scripts);
    }

    protected function getContent() {
        return $this->content;
    }

    protected function getBodyAttributes() {
        return $this->bodyAttributes;
    }

    public function getTag() {
        return $this->t;
    }

}