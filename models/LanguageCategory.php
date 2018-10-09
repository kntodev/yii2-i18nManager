<?php

namespace kntodev\i18nmanager\models;

use Yii;

/**
 * This is the model class for table "language_category".
 *
 * @property int $id
 * @property string $category
 * @property string $base_language
 * @property string $data
 */
class LanguageCategory extends \yii\db\ActiveRecord
{
    public $languages = '{"ab":"\u0430\u04a7\u0441\u0448\u04d9\u0430","aa":"Afaraf","af":"Afrikaans","ak":"Akan","sq":"Shqip","am":"\u12a0\u121b\u122d\u129b","ar":"\u0627\u0644\u0639\u0631\u0628\u064a\u0629","an":"aragon\u00e9s","hy":"\u0540\u0561\u0575\u0565\u0580\u0565\u0576","as":"\u0985\u09b8\u09ae\u09c0\u09af\u09bc\u09be","av":"\u043c\u0430\u0433\u04c0\u0430\u0440\u0443\u043b \u043c\u0430\u0446\u04c0","ae":"avesta","ay":"aymar aru","az":"az\u0259rbaycan dili","bm":"bamanankan","ba":"\u0431\u0430\u0448\u04a1\u043e\u0440\u0442 \u0442\u0435\u043b\u0435","eu":"euskara","be":"\u0431\u0435\u043b\u0430\u0440\u0443\u0441\u043a\u0430\u044f \u043c\u043e\u0432\u0430","bn":"\u09ac\u09be\u0982\u09b2\u09be","bh":"\u092d\u094b\u091c\u092a\u0941\u0930\u0940","bi":"Bislama","bs":"bosanski jezik","br":"brezhoneg","bg":"\u0431\u044a\u043b\u0433\u0430\u0440\u0441\u043a\u0438 \u0435\u0437\u0438\u043a","my":"\u1017\u1019\u102c\u1005\u102c","ca":"catal\u00e0","ch":"Chamoru","ce":"\u043d\u043e\u0445\u0447\u0438\u0439\u043d \u043c\u043e\u0442\u0442","ny":"chinyanja","zh":"\u6f22\u8a9e","cv":"\u0447\u04d1\u0432\u0430\u0448 \u0447\u04d7\u043b\u0445\u0438","kw":"Kernewek","co":"corsu","cr":"\u14c0\u1426\u1403\u152d\u140d\u140f\u1423","hr":"hrvatski jezik","cs":"\u010de\u0161tina","da":"dansk","dv":"\u078b\u07a8\u0788\u07ac\u0780\u07a8","nl":"Vlaams","dz":"\u0f62\u0fab\u0f7c\u0f44\u0f0b\u0f41","en":"English","eo":"Esperanto","et":"eesti","ee":"E\u028begbe","fo":"f\u00f8royskt","fj":"vosa Vakaviti","fi":"suomi","fr":"fran\u00e7ais","ff":"Fulfulde","gl":"galego","ka":"\u10e5\u10d0\u10e0\u10d7\u10e3\u10da\u10d8","de":"Deutsch","el":"\u03b5\u03bb\u03bb\u03b7\u03bd\u03b9\u03ba\u03ac","gu":"\u0a97\u0ac1\u0a9c\u0ab0\u0abe\u0aa4\u0ac0","ht":"Krey\u00f2l ayisyen","ha":"(Hausa) \u0647\u064e\u0648\u064f\u0633\u064e","he":"\u05e2\u05d1\u05e8\u05d9\u05ea","hz":"Otjiherero","hi":"\u0939\u093f\u0928\u094d\u0926\u0940","ho":"Hiri Motu","hu":"magyar","ia":"Interlingua","id":"Bahasa Indonesia","ie":"Interlingue","ga":"Gaeilge","ig":"As\u1ee5s\u1ee5 Igbo","ik":"I\u00f1upiaq","io":"Ido","is":"\u00cdslenska","it":"Italiano","iu":"\u1403\u14c4\u1483\u144e\u1450\u1466","ja":"\u65e5\u672c\u8a9e (\u306b\u307b\u3093\u3054)","jv":"\ua9a7\ua9b1\ua997\ua9ae","kl":"kalaallisut","kn":"\u0c95\u0ca8\u0ccd\u0ca8\u0ca1","kr":"Kanuri","ks":"\u0915\u0936\u094d\u092e\u0940\u0930\u0940","kk":"\u049b\u0430\u0437\u0430\u049b \u0442\u0456\u043b\u0456","km":"\u1781\u17d2\u1798\u17c2\u179a","ki":"G\u0129k\u0169y\u0169","rw":"Ikinyarwanda","ky":"\u041a\u044b\u0440\u0433\u044b\u0437\u0447\u0430","kv":"\u043a\u043e\u043c\u0438 \u043a\u044b\u0432","kg":"Kikongo","ko":"\ud55c\uad6d\uc5b4","ku":"Kurd\u00ee","kj":"Kuanyama","la":"latine","lb":"L\u00ebtzebuergesch","lg":"Luganda","li":"Limburgs","ln":"Ling\u00e1la","lo":"\u0e9e\u0eb2\u0eaa\u0eb2\u0ea5\u0eb2\u0ea7","lt":"lietuvi\u0173 kalba","lu":"Tshiluba","lv":"latvie\u0161u valoda","gv":"Gaelg","mk":"\u043c\u0430\u043a\u0435\u0434\u043e\u043d\u0441\u043a\u0438 \u0458\u0430\u0437\u0438\u043a","mg":"fiteny malagasy","ms":"\u0628\u0647\u0627\u0633 \u0645\u0644\u0627\u064a\u0648","ml":"\u0d2e\u0d32\u0d2f\u0d3e\u0d33\u0d02","mt":"Malti","mi":"te reo M\u0101ori","mr":"\u092e\u0930\u093e\u0920\u0940","mh":"Kajin M\u0327aje\u013c","mn":"\u041c\u043e\u043d\u0433\u043e\u043b \u0445\u044d\u043b","na":"Dorerin Naoero","nv":"Din\u00e9 bizaad","nd":"isiNdebele","ne":"\u0928\u0947\u092a\u093e\u0932\u0940","ng":"Owambo","nb":"Norsk bokm\u00e5l","nn":"Norsk nynorsk","no":"Norsk","ii":"\ua188\ua320\ua4bf Nuosuhxop","nr":"isiNdebele","oc":"occitan","oj":"\u140a\u14c2\u1511\u14c8\u142f\u14a7\u140e\u14d0","cu":"\u0469\u0437\u044b\u043a\u044a \u0441\u043b\u043e\u0432\u0463\u043d\u044c\u0441\u043a\u044a","om":"Afaan Oromoo","or":"\u0b13\u0b21\u0b3c\u0b3f\u0b06","os":"\u0438\u0440\u043e\u043d \u00e6\u0432\u0437\u0430\u0433","pa":"\u0a2a\u0a70\u0a1c\u0a3e\u0a2c\u0a40","pi":"\u092a\u093e\u0934\u093f","fa":"\u0641\u0627\u0631\u0633\u06cc","pl":"polszczyzna","ps":"\u067e\u069a\u062a\u0648","pt":"Portugu\u00eas","qu":"Runa Simi","rm":"rumantsch grischun","rn":"Ikirundi","ro":"Rom\u00e2n\u0103","ru":"\u0420\u0443\u0441\u0441\u043a\u0438\u0439","sa":"\u0938\u0902\u0938\u094d\u0915\u0943\u0924\u092e\u094d","sc":"sardu","sd":"\u0938\u093f\u0928\u094d\u0927\u0940","se":"Davvis\u00e1megiella","sg":"y\u00e2ng\u00e2 t\u00ee s\u00e4ng\u00f6","sr":"\u0441\u0440\u043f\u0441\u043a\u0438 \u0458\u0435\u0437\u0438\u043a","gd":"G\u00e0idhlig","sn":"chiShona","si":"\u0dc3\u0dd2\u0d82\u0dc4\u0dbd","sk":"sloven\u010dina","sl":"sloven\u0161\u010dina","so":"Soomaaliga","st":"Sesotho","es":"Espa\u00f1ol","su":"Basa Sunda","sw":"Kiswahili","ss":"SiSwati","sv":"svenska","ta":"\u0ba4\u0bae\u0bbf\u0bb4\u0bcd","te":"\u0c24\u0c46\u0c32\u0c41\u0c17\u0c41","tg":"\u062a\u0627\u062c\u06cc\u06a9\u06cc","th":"\u0e44\u0e17\u0e22","ti":"\u1275\u130d\u122d\u129b","bo":"\u0f56\u0f7c\u0f51\u0f0b\u0f61\u0f72\u0f42","tk":"\u0422\u04af\u0440\u043a\u043c\u0435\u043d","tl":"Wikang Tagalog","tn":"Setswana","to":"faka Tonga","tr":"T\u00fcrk\u00e7e","ts":"Xitsonga","tt":"\u0442\u0430\u0442\u0430\u0440 \u0442\u0435\u043b\u0435","tw":"Twi","ty":"Reo Tahiti","ug":"\u0626\u06c7\u064a\u063a\u06c7\u0631\u0686\u06d5","uk":"\u0423\u043a\u0440\u0430\u0457\u043d\u0441\u044c\u043a\u0430","ur":"\u0627\u0631\u062f\u0648","uz":"\u0623\u06c7\u0632\u0628\u06d0\u0643\u200e","ve":"Tshiven\u1e13a","vi":"Ti\u1ebfng Vi\u1ec7t","vo":"Volap\u00fck","wa":"walon","cy":"Cymraeg","wo":"Wollof","fy":"Frysk","xh":"isiXhosa","yi":"\u05d9\u05d9\u05b4\u05d3\u05d9\u05e9","yo":"Yor\u00f9b\u00e1","za":"Sa\u026f cue\u014b\u0185","zu":"isiZulu"}';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'language_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category', 'base_language'], 'required'],
            [['data'], 'string'],
            [['data'], 'safe'],
            [['category'], 'string', 'max' => 100],
            [['base_language'], 'string', 'max' => 10],
            [['category'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'base_language' => 'Base Language',
            'data' => 'Translations',
        ];
    }
}
