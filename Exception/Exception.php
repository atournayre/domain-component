<?php

namespace Atournayre\Component\Domain\Exception;

class Exception extends \Exception implements ExceptionInterface
{
    protected string $messageKey;
    protected array $messageData;

    public function __construct(array $messageData = [], int $code = 0, \Throwable $previous = null)
    {
        parent::__construct('', $code, $previous);

        $this->setSafeMessage('', $messageData);

        $this->message = count($messageData) === 0 ? $messageData : vsprintf($this->getMessageKey(), $messageData);
    }

    /**
     * Sets a message that will be shown to the user.
     *
     * @param string $messageKey  The message or message key
     * @param array  $messageData Data to be passed into the translator
     */
    public function setSafeMessage(string $messageKey, array $messageData = [])
    {
        $this->messageKey = $messageKey;
        $this->messageData = $messageData;
    }

    public function getMessageKey(): string
    {
        return 'An Exception occurs.';
    }

    public function getMessageData(): array
    {
        return $this->messageData;
    }
}
