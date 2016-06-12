## Synopsis

My last year as a student of Web Applications Developing VET Course. 
The main idea is a web app which plan a cinema evening for you. It lets you choose more movies based in when will you end watching the previous one.
I'm trying to make it automatic, so no backend is needed.

## Code Example
function showAllMovies($hourPass, $transporte)
	{
		for ($cine1=1; $cine1<6; $cine1++)
		{
			$time=new DateTime($hourPass);
			$transporte=2;
			for ($cine2=1; $cine2<6; $cine2++)
			{
				if ($cine1==$cine2)
				{
					$transporte=0;
				}
				$time->add(new DateInterval('PT'.travelTime($cine1, $cine2, $transporte).'M'));
				
				showMovies($time, $cine2);
			}
		}
	}

## Motivation

As I said previously, is my end of grade project.

## Installation

Just as easy as click the download button.

## Contributors

You can fin me in twitter as @ireneladler, also you can find me in LinkedIn.

## License

(CC) BY NC SA
