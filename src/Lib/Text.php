<?php 
namespace App\Lib;

/**
 * Class Text
 * Permet de convertir du texte en diférent format
 */
class Text
{
	/**
	 * ArrayToObjet
	 * Convertie un tableau en objet
	 * 
	 * @param array $data
	 * 
	 * @return object
	 */
	public function ArrayToObjet($data): object
	{
		$data = json_encode($data);
		$data = json_decode($data);
		return $data;
	}

	/**
	 * ObjetToArray
	 * Convertie un objet en tableau
	 * 
	 * @param array $data
	 * 
	 * @return array
	 */
	public function ObjetToArray($data): array
	{
		$data = json_encode($data);
		$data = json_decode($data, true);
		return $data;
	}

	/**
	 * Excerpt
	 * Récupère l'extrait d'un texte à la fin d'un mot
	 *
	 * @param string $content
	 * @param int $limit Le nombres de caractère minimum à afficher (150 par défaut)
	 *
	 * @return string
	 */
	public static function Excerpt(string $content, int $limit = 150): string
	{
		//	Si le texte a moins de caractère que "$limit", on le retourne tel qu'elle
		if (mb_strlen($content) <= $limit) {
			return $content;
		}
		//	On cherche un espace après le caractère défini par $limit
		$lastSpace = mb_strpos($content, ' ', $limit);
		//	On retourne l'extrait avec un mot complet pour finir(Plus joli à l'affichage)
		return mb_substr($content, 0, $lastSpace) .' ...';
	}

	/**
	 * Slugify
	 * Convertie une chaine de caractère pour affichage dans la chaîne de requète(URL)

	 * @param string $sString

	 * @return string
	 */
	public function Slugify(string $content):string {
		$content = preg_replace('#-#', ' ', $content);
		$content = transliterator_transliterate("Any-Latin; NFD; [:Nonspacing Mark:] Remove; NFC; [:Punctuation:] Remove; Lower();", $content);
		$content = preg_replace('# #', '-', $content);
		$content = preg_replace('#---#', '-', $content);
		$content = preg_replace('#--#', '-', $content);
		$content = preg_replace('#œ#', 'oe', $content);
		$content = preg_replace('#æ#', 'ae', $content);
		$content = trim($content,'-');
		return $content;
	}

	/**
	 * Slug
	 * Convertie une chaine de caractère pour affichage dans la chaîne de requète(URL)
	 * 
	 * @param string $string
	 * @param string $delimiter '-' par défaut
	 * 
	 * @return string
	 */
	public function Slug(string $string, string $delimiter = '-'): string
	{
		$oldLocale = setlocale(LC_ALL, '0');
		setlocale(LC_ALL, 'fr_FR.UTF-8');
		$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
		$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
		$clean = strtolower($clean);
		$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
		$clean = trim($clean, $delimiter);
		setlocale(LC_ALL, $oldLocale);
		return $clean;
	}

	/**
	 * RamaCode
	 * Converti une chaine de caractère pour afficher des balise html
	 * 
	 * @param string $text
	 * 
	 * @return string
	 */
	public function RamaCode($text)
	{
		$text = htmlspecialchars($text);
		$text = preg_replace('#\[b\](.+)\[/b\]#isU', '<strong>$1</strong>', $text);
		$text = preg_replace('#\[i\](.+)\[/i\]#isU', '<em>$1</em>', $text);
		$text = preg_replace('#\[del\](.+)\[/del\]#isU', '<del>$1</del>', $text);
		$text = preg_replace('#\[a href=(.+)\](.+)\[/a\]#isU', '<a class="nav-link p-0 d-inline" href=$1>$2</a>', $text);
		$text = preg_replace('#\[img src=(.+) alt=(.+)\]#isU', '<img class="img-fluid rounded d-block mr-auto ml-auto mt-3" src="$1" alt="$2"/>', $text);

		$text = preg_replace('#\[h1\](.+)\[/h1\]#isU', '<span class="bbcode-h1">$1</span>', $text);
		$text = preg_replace('#\[h2\](.+)\[/h2\]#isU', '<span class="bbcode-h2">$1</span>', $text);
		$text = preg_replace('#\[h3\](.+)\[/h3\]#isU', '<span class="bbcode-h3">$1</span>', $text);
		$text = preg_replace('#\[h4\](.+)\[/h4\]#isU', '<span class="bbcode-h4">$1</span>', $text);
		$text = preg_replace('#\[h5\](.+)\[/h5\]#isU', '<span class="bbcode-h5">$1</span>', $text);
		$text = preg_replace('#\[h6\](.+)\[/h6\]#isU', '<span class="bbcode-h6">$1</span>', $text);

		$text = preg_replace('#\[ul\](.+)\[/ul\]#isU', '<ul>$1</ul>', $text);
		$text = preg_replace('#\[ol\](.+)\[/ol\]#isU', '<ol>$1</ol>', $text);
		$text = preg_replace('#\[li\](.+)\[/li\]#isU', '<li>$1</li>', $text);
		$text = preg_replace('#\[p\](.+)\[/p\]#isU', '<p>$1</p>', $text);
		return $text;
	}
}