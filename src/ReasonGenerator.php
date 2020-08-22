<?php

declare(strict_types=1);

namespace Nyholm\Why;

/**
 * A port from MathLabs "why" function.
 */
class ReasonGenerator
{
    private const nouns = ['mathematician', 'programmer', 'product manager', 'engineer', 'web developer', 'hamster', 'kid', 'backend developer'];
    private const nominativePronouns = ['I', 'you', 'he', 'she', 'they'];
    private const accusativePronouns = ['me', 'all', 'her', 'him'];
    private const nounedVerbs = ['love', 'approval'];
    private const adverbs = ['very', 'not very', 'not excessively'];
    private const adjectives = ['tall', 'bald', 'young', 'smart', 'rich', 'terrified', 'good'];
    private const articles = ['the', 'some', 'a'];
    private const prepositions = ['to', 'from', 'with', 'at', 'on', 'in', 'behind', 'under'];
    private const properNouns = ['Tobias', 'Jack', 'Jane', 'Lynn', 'Pauline', 'Loren', 'Sara', 'Michelle', 'Nicolas', 'Annette', 'Taylor', 'Fabien'];
    private const presentVerbs = ['fool', 'please', 'satisfy'];
    private const transitiveVerbs = ['threatened', 'told', 'asked', 'helped', 'obeyed'];
    private const intransitiveVerbs = ['insisted on it', 'suggested it', 'told me to', 'wanted it', 'knew it was a good idea', 'wanted it that way'];
    private const specialCases = [
        'why not?',
        'don\'t ask!',
        'it\'s your karma.',
        'stupid question!',
        'how should I know?',
        'can you rephrase that?',
        'it should be obvious.',
        'the devil made me do it.',
        'the computer did it.',
        'the customer is always right.',
        'in the beginning, God created the heavens and the earth...',
        'don\'t you have something better to do?',
    ];

    public function generate(): string
    {
        $rand = rand(1, 10);
        switch ($rand) {
            case 1:
              $output = $this->rand(self::specialCases);

              break;
            case 2:
            case 3:
            case 4:
              $output = $this->phrase();

              break;
            default:
              $output = $this->sentence();
        }

        return ucfirst($output);
    }

    private function phrase(): string
    {
        $rand = rand(1, 3);
        switch ($rand) {
            case 1:
              return 'for the ' . $this->rand(self::nounedVerbs) . ' ' . $this->prepositionalPhrase() . '.';
            case 2:
              return 'to ' . $this->rand(self::presentVerbs) . ' ' . $this->object() . '.';
            case 3:
              return 'because ' . $this->sentence();
        }
    }

    private function prepositionalPhrase(): string
    {
        $rand = rand(1, 3);
        switch ($rand) {
            case 1:
              return $this->rand(self::prepositions) . ' ' . $this->rand(self::articles) . ' ' . $this->nounPhrase();
            case 2:
              return $this->rand(self::prepositions) . ' ' . $this->rand(self::properNouns);
            case 3:
              return $this->rand(self::prepositions) . ' ' . $this->rand(self::accusativePronouns);
        }
    }

    private function sentence(): string
    {
        return $this->subject() . ' ' . $this->predicate() . '.';
    }

    private function subject(): string
    {
        $rand = rand(1, 4);
        switch ($rand) {
            case 1:
              return $this->rand(self::properNouns);
            case 2:
                return $this->rand(self::nominativePronouns);
            default:
              return $this->rand(self::articles) . ' ' . $this->nounPhrase();
        }
    }

    private function nounPhrase(): string
    {
        $rand = rand(1, 4);
        switch ($rand) {
            case 1:
              return $this->rand(self::nouns);
            case 2:
                return $this->adjectivePhrase() . ' ' . $this->nounPhrase();
            default:
                return $this->adjectivePhrase() . ' ' . $this->rand(self::nouns);
        }
    }

    private function adjectivePhrase(): string
    {
        $rand = rand(1, 6);
        switch ($rand) {
            case 1:
            case 2:
            case 3:
              return $this->rand(self::adjectives);
            case 4:
            case 5:
                return $this->rand(self::accusativePronouns) . ' and ' . $this->rand(self::accusativePronouns);
            case 6:
                return $this->rand(self::adverbs) . ' ' . $this->rand(self::adjectives);
        }
    }

    private function predicate(): string
    {
        $rand = rand(1, 3);
        switch ($rand) {
            case 1:
                return $this->rand(self::transitiveVerbs) . ' ' . $this->object();
            default:
                return $this->rand(self::intransitiveVerbs);
        }
    }

    private function object(): string
    {
        $rand = rand(1, 10);
        switch ($rand) {
            case 1:
                return $this->rand(self::accusativePronouns);
            default:
                return $this->rand(self::articles) . ' ' . $this->nounPhrase();
        }
    }

    /**
     * @param array<string> $words
     */
    private function rand(array $words): string
    {
        return $words[array_rand($words, 1)];
    }
}