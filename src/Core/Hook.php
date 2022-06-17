<?php

/*
 * BigBlueButton open source conferencing system - https://www.bigbluebutton.org/.
 *
 * Copyright (c) 2016-2022 BigBlueButton Inc. and by respective authors (see below).
 *
 * This program is free software; you can redistribute it and/or modify it under the
 * terms of the GNU Lesser General Public License as published by the Free Software
 * Foundation; either version 3.0 of the License, or (at your option) any later
 * version.
 *
 * BigBlueButton is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License along
 * with BigBlueButton; if not, see <http://www.gnu.org/licenses/>.
 */

namespace BigBlueButton\Core;

/**
 * Class Meeting.
 */
class Hook
{
    /**
     * @var \SimpleXMLElement
     */
    protected $rawXml;

    /**
     * @var string
     */
    private $hookId;

    /**
     * @var string
     */
    private $meetingId;

    /**
     * @var string
     */
    private $callbackUrl;

    /**
     * @var boolean
     */
    private $permanentHook;

    /**
     * @var boolean
     */
    private $rawData;

    /**
     * Meeting constructor.
     *
     * @param $xml \SimpleXMLElement
     */
    public function __construct($xml)
    {
        $this->rawXml        = $xml;
        $this->hookId        = (int) $xml->hookID->__toString();
        $this->callbackUrl   = $xml->callbackURL->__toString();
        $this->meetingId     = $xml->meetingID->__toString();
        $this->permanentHook = 'true' === $xml->permanentHook->__toString();
        $this->rawData       = 'true' === $xml->rawData->__toString();
    }

    /**
     * @return string
     */
    public function getHookId()
    {
        return $this->hookId;
    }

    /**
     * @return string
     */
    public function getMeetingId()
    {
        return $this->meetingId;
    }

    /**
     * @return string
     */
    public function getCallbackUrl()
    {
        return $this->callbackUrl;
    }

    /**
     * @return boolean
     */
    public function isPermanentHook()
    {
        return $this->permanentHook;
    }

    /**
     * @return boolean
     */
    public function hasRawData()
    {
        return $this->rawData;
    }
}
