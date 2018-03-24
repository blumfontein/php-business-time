<?php

namespace BusinessTime\Constraint;

use DateTime;

/**
 * Constraint that matches business times using a date time format and
 * corresponding matching string.
 *
 * e.g. new FormatConstraint('l', 'Monday') matches any time on a Monday as
 * business time.
 */
class FormatConstraint implements BusinessTimeConstraint
{
    /** @var string */
    private $format;

    /** @var string[] */
    private $matches;

    /**
     * @param string $format
     * @param string ...$matches
     */
    public function __construct(string $format, string ...$matches)
    {
        $this->format = $format;
        $this->matches = $matches;
    }

    /**
     * Is the given time business time according to this constraint?
     *
     * @param DateTime $time
     *
     * @return bool
     */
    public function isBusinessTime(DateTime $time): bool
    {
        return \in_array($time->format($this->format), $this->matches, true);
    }
}
